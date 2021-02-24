<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlanesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlanesTable Test Case
 */
class PlanesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PlanesTable
     */
    public $Planes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.planes',
        'app.cursos',
        'app.anuncios',
        'app.talleres',
        'app.pagos',
        'app.cursos_pagos',
        'app.sesiones',
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
        $config = TableRegistry::exists('Planes') ? [] : ['className' => PlanesTable::class];
        $this->Planes = TableRegistry::get('Planes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Planes);

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
}
