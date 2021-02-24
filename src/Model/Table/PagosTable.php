<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pagos Model
 *
 * @property \App\Model\Table\CursosTable|\Cake\ORM\Association\BelongsToMany $Cursos
 *
 * @method \App\Model\Entity\Pago get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pago newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pago[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pago|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pago patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pago[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pago findOrCreate($search, callable $callback = null, $options = [])
 */
class PagosTable extends Table
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

        $this->setTable('pagos');
        $this->setDisplayField('cod_pago');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Cursos', [
            'foreignKey' => 'pago_id',
            'targetForeignKey' => 'curso_id',
            'joinTable' => 'cursos_pagos'
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
            ->integer('cod_pago')
            ->requirePresence('cod_pago', 'create')
            ->notEmpty('cod_pago','No se puede dejar vacio!')
            ->add('cod_pago', [
                    'minLength' => [
                        'rule' => ['minLength', 3],
                        'message' => 'Debe ingresar mínimos 3 digitos!'
                    ],
                    'maxLength' => [
                        'rule' => ['maxLength', 3],
                        'message' => 'Debe ingresar máximo 3 digitos!'
                    ],
                    /*'unique' => [
                        'rule' => 'validateUnique', 
                        'provider' => 'table', 
                        'message' => 'Este Código de pago ya ha sido creado']*/
                ]);

        $validator
            ->numeric('precio')
            ->requirePresence('precio', 'create')
            ->notEmpty('precio','No se puede dejar vacio!')
            ->add('precio',[
                  'minLength' => [
                        'rule' => ['minLength', 2],
                        'message' => 'Debe ingresar mínimos 2 digitos!'
                    ],
                    'maxLength' => [
                        'rule' => ['maxLength', 3],
                        'message' => 'Debe ingresar máximo 3 digitos!'
                    ],  
                ]);

        $validator
            ->scalar('categoria')
            ->requirePresence('categoria', 'create')
            ->notEmpty('categoria','No se puede dejar vacio');

        return $validator;
    }
}
