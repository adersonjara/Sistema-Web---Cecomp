<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CursosPagosFixture
 *
 */
class CursosPagosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'curso_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'pago_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'curso_id' => ['type' => 'index', 'columns' => ['curso_id'], 'length' => []],
            'pago_id' => ['type' => 'index', 'columns' => ['pago_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'cursos_pagos_ibfk_1' => ['type' => 'foreign', 'columns' => ['curso_id'], 'references' => ['cursos', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'cursos_pagos_ibfk_2' => ['type' => 'foreign', 'columns' => ['pago_id'], 'references' => ['pagos', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'curso_id' => 1,
            'pago_id' => 1
        ],
    ];
}
