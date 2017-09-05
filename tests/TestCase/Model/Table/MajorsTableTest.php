<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MajorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MajorsTable Test Case
 */
class MajorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MajorsTable
     */
    public $Majors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.majors',
        'app.users',
        'app.interests',
        'app.projects',
        'app.users_projects',
        'app.skills',
        'app.users_skills'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Majors') ? [] : ['className' => MajorsTable::class];
        $this->Majors = TableRegistry::get('Majors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Majors);

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
