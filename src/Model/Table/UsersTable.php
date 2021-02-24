<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');
        $validator
            ->requirePresence('fullname')
            ->notEmpty('fullname', 'No se puede dejar vacio!')
            ->add('fullname', [
                'validFormat' => [
                    'rule' => ['custom','/^[a-zA-Z áéíóúÁÉÍÓÚñÑ.]+$/'],
                    'message' => 'Por favor solo ingrese letras sin tildes´, ni caracteres especiales!'
                ],
                'length' => [
                    'rule' => ['minLength', 10],
                    'message' => 'Como mínimo debe tener 10 letras!'
                ]
                
            ]);

        $validator
            ->requirePresence('username')
            ->notEmpty('username', 'No se puede dejar vacio!')
            ->lengthBetween('username', [4, 20],'Ingresar de 4 a 20 letras y números!')
            ->add('username', [
                'validFormat' => [
                    'rule' => ['custom','/^[0-9a-z]+$/'],
                    'message' => 'Por favor solo ingrese letras minúsculas y números, sin espacio!'
                ],
            ]);

        $validator
            ->maxLength('password', 255)
            ->minLength('password', 4,'Debe tener al menos 4 caracteres')
            ->requirePresence('password', 'create')
            ->notEmpty('password','No se puede dejar vacío!');

        $validator
            ->sameAs('password_match','password','Las contraseñas no coinciden!')
            ->notEmpty('password_match','No se puede dejar vacío!');


        $validator
            ->requirePresence('role', 'create')
            ->notEmpty('role');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username'],'Ya existe ese nombre de usuario!'));

        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->select(['fullname','username', 'role','password'])
            ->where(['Users.active' => 1]);
        return $query;
    }
}
