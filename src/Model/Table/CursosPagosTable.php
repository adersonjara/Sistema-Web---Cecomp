<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CursosPagos Model
 *
 * @property \App\Model\Table\CursosTable|\Cake\ORM\Association\BelongsTo $Cursos
 * @property \App\Model\Table\PagosTable|\Cake\ORM\Association\BelongsTo $Pagos
 *
 * @method \App\Model\Entity\CursosPago get($primaryKey, $options = [])
 * @method \App\Model\Entity\CursosPago newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CursosPago[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CursosPago|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CursosPago patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CursosPago[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CursosPago findOrCreate($search, callable $callback = null, $options = [])
 */
class CursosPagosTable extends Table
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

        $this->setTable('cursos_pagos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cursos', [
            'foreignKey' => 'curso_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pagos', [
            'foreignKey' => 'pago_id',
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
        $rules->add($rules->existsIn(['curso_id'], 'Cursos'));
        $rules->add($rules->existsIn(['pago_id'], 'Pagos'));

        return $rules;
    }
}
