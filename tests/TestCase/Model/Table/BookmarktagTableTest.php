<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookmarktagTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookmarktagTable Test Case
 */
class BookmarktagTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BookmarktagTable
     */
    public $Bookmarktag;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bookmarktag',
        'app.bookmarks',
        'app.users',
        'app.tags',
        'app.bookmarks_tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bookmarktag') ? [] : ['className' => BookmarktagTable::class];
        $this->Bookmarktag = TableRegistry::get('Bookmarktag', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bookmarktag);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
