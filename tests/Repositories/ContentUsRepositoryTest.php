<?php namespace Tests\Repositories;

use App\Models\ContentUs;
use App\Repositories\ContentUsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ContentUsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContentUsRepository
     */
    protected $contentUsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contentUsRepo = \App::make(ContentUsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_content_us()
    {
        $contentUs = factory(ContentUs::class)->make()->toArray();

        $createdContentUs = $this->contentUsRepo->create($contentUs);

        $createdContentUs = $createdContentUs->toArray();
        $this->assertArrayHasKey('id', $createdContentUs);
        $this->assertNotNull($createdContentUs['id'], 'Created ContentUs must have id specified');
        $this->assertNotNull(ContentUs::find($createdContentUs['id']), 'ContentUs with given id must be in DB');
        $this->assertModelData($contentUs, $createdContentUs);
    }

    /**
     * @test read
     */
    public function test_read_content_us()
    {
        $contentUs = factory(ContentUs::class)->create();

        $dbContentUs = $this->contentUsRepo->find($contentUs->id);

        $dbContentUs = $dbContentUs->toArray();
        $this->assertModelData($contentUs->toArray(), $dbContentUs);
    }

    /**
     * @test update
     */
    public function test_update_content_us()
    {
        $contentUs = factory(ContentUs::class)->create();
        $fakeContentUs = factory(ContentUs::class)->make()->toArray();

        $updatedContentUs = $this->contentUsRepo->update($fakeContentUs, $contentUs->id);

        $this->assertModelData($fakeContentUs, $updatedContentUs->toArray());
        $dbContentUs = $this->contentUsRepo->find($contentUs->id);
        $this->assertModelData($fakeContentUs, $dbContentUs->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_content_us()
    {
        $contentUs = factory(ContentUs::class)->create();

        $resp = $this->contentUsRepo->delete($contentUs->id);

        $this->assertTrue($resp);
        $this->assertNull(ContentUs::find($contentUs->id), 'ContentUs should not exist in DB');
    }
}
