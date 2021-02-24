<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubsesionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubsesionesTable Test Case
 */
class SubsesionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubsesionesTable
     */
    public $Subsesiones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.subsesiones',
        'app.sesiones',
        'app.planes',
        'app.cursos',
        'app.anuncios',
        'app.talleres',
        'app.pagos',
        'app.cursos_pagos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Subsesiones') ? [] : ['className' => SubsesionesTable::class];
        $this->Subsesiones = TableRegistry::get('Subsesiones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Subsesiones);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
