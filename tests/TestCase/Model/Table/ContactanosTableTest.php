<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactanosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactanosTable Test Case
 */
class ContactanosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContactanosTable
     */
    public $Contactanos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contactanos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Contactanos') ? [] : ['className' => ContactanosTable::class];
        $this->Contactanos = TableRegistry::get('Contactanos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Contactanos);

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
