<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Planes Model
 *
 * @property \App\Model\Table\CursosTable|\Cake\ORM\Association\HasMany $Cursos
 * @property \App\Model\Table\SesionesTable|\Cake\ORM\Association\HasMany $Sesiones
 *
 * @method \App\Model\Entity\Plane get($primaryKey, $options = [])
 * @method \App\Model\Entity\Plane newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Plane[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Plane|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plane patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Plane[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Plane findOrCreate($search, callable $callback = null, $options = [])
 */
class PlanesTable extends Table
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

        $this->setTable('planes');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->hasOne('Cursos', [
            'foreignKey' => 'plane_id',
        ]);
        $this->hasMany('Sesiones', [
            'foreignKey' => 'plane_id',
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
            ->requirePresence('nombre')
            ->notEmpty('nombre', 'No se puede dejar vacio!')
            ->add('nombre', [
                'length' => [
                    'rule' => ['minLength', 20],
                    'message' => 'El nombre del plan debe tener al menos 20 caracteres! Ejemplo: Plan de Estudios PHP',
                ],
                'unique' => [
                    'rule' => 'validateUnique', 
                    'provider' => 'table', 
                    'message' => 'Este plan ya ha sido creado']
            ]);

        $validator
            ->requirePresence('descripcion', 'create')
            ->allowEmpty('descripcion')
            ->add('descripcion', [
                'length' => [
                    'rule' => ['minLength', 15],
                    'message' => 'El descripcion del plan debe tener al menos 15 caracteres!',
                ],
            ]);

        return $validator;
    }
}
