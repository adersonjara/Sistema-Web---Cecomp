<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TalleresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TalleresTable Test Case
 */
class TalleresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TalleresTable
     */
    public $Talleres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.talleres',
        'app.cursos',
        'app.planes',
        'app.sesiones',
        'app.subsesiones',
        'app.anuncios',
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
        $config = TableRegistry::exists('Talleres') ? [] : ['className' => TalleresTable::class];
        $this->Talleres = TableRegistry::get('Talleres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Talleres);

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
