<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SesionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SesionesTable Test Case
 */
class SesionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SesionesTable
     */
    public $Sesiones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sesiones',
        'app.planes',
        'app.cursos',
        'app.anuncios',
        'app.talleres',
        'app.pagos',
        'app.cursos_pagos',
        'app.subsesiones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sesiones') ? [] : ['className' => SesionesTable::class];
        $this->Sesiones = TableRegistry::get('Sesiones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sesiones);

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
