<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subsesiones Model
 *
 * @property \App\Model\Table\SesionesTable|\Cake\ORM\Association\BelongsTo $Sesiones
 *
 * @method \App\Model\Entity\Subsesione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Subsesione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Subsesione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Subsesione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subsesione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Subsesione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Subsesione findOrCreate($search, callable $callback = null, $options = [])
 */
class SubsesionesTable extends Table
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

        $this->setTable('subsesiones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Sesiones', [
            'foreignKey' => 'sesione_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
            'joinType' => 'INNER'
        ]);
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
            ->requirePresence('sub_tema')
            ->notEmpty('sub_tema', 'No se puede dejar vacio!')
            ->add('sub_tema', [
                'length' => [
                    'rule' => ['minLength', 5],
                    'message' => 'El subtema debe tener al menos 5 caracteres!',
                ]
            ]);

        $validator
            ->requirePresence('sesione_id')
            ->notEmpty('sesione_id', 'No se puede dejar vacio!');

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
        $rules->add($rules->existsIn(['sesione_id'], 'Sesiones'));

        return $rules;
    }
}
