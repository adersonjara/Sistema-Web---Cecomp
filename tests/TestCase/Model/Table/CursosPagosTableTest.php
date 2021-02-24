<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CursosPagosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CursosPagosTable Test Case
 */
class CursosPagosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CursosPagosTable
     */
    public $CursosPagos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cursos_pagos',
        'app.cursos',
        'app.planes',
        'app.sesiones',
        'app.subsesiones',
        'app.anuncios',
        'app.talleres',
        'app.pagos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CursosPagos') ? [] : ['className' => CursosPagosTable::class];
        $this->CursosPagos = TableRegistry::get('CursosPagos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CursosPagos);

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
