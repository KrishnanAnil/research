<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InterestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InterestsTable Test Case
 */
class InterestsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InterestsTable
     */
    public $Interests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.interests',
        'app.users',
        'app.majors',
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
        $config = TableRegistry::exists('Interests') ? [] : ['className' => InterestsTable::class];
        $this->Interests = TableRegistry::get('Interests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Interests);

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
