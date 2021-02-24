<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sesiones Model
 *
 * @property \App\Model\Table\PlanesTable|\Cake\ORM\Association\BelongsTo $Planes
 * @property \App\Model\Table\SubsesionesTable|\Cake\ORM\Association\HasMany $Subsesiones
 *
 * @method \App\Model\Entity\Sesione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sesione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sesione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sesione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sesione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sesione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sesione findOrCreate($search, callable $callback = null, $options = [])
 */
class SesionesTable extends Table
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

        $this->setTable('sesiones');
        $this->setDisplayField('tema');
        $this->setPrimaryKey('id');

        $this->belongsTo('Planes', [
            'foreignKey' => 'plane_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Subsesiones', [
            'foreignKey' => 'sesione_id',
            'dependent' => true,
            'cascadeCallbacks' => true
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
            ->requirePresence('tema')
            ->notEmpty('tema', 'No se puede dejar vacio!')
            ->add('tema', [
                'length' => [
                    'rule' => ['minLength', 5],
                    'message' => 'El tema del plan debe tener al menos 5 caracteres!',
                ]
            ]);

        $validator
            ->requirePresence('descripcion', 'create')
            ->allowEmpty('descripcion')
            ->add('descripcion', [
                'length' => [
                    'rule' => ['minLength', 15],
                    'message' => 'El descripcion del tema debe tener al menos 15 caracteres!',
                ],
            ]);

        $validator
            ->requirePresence('plane_id')
            ->notEmpty('plane_id', 'No se puede dejar vacio!');
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
        $rules->add($rules->existsIn(['plane_id'], 'Planes'));

        return $rules;
    }
}
