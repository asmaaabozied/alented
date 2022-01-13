<?php namespace Tests\Repositories;

use App\Models\InformativeData;
use App\Repositories\InformativeDataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class InformativeDataRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var InformativeDataRepository
     */
    protected $informativeDataRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->informativeDataRepo = \App::make(InformativeDataRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_informative_data()
    {
        $informativeData = factory(InformativeData::class)->make()->toArray();

        $createdInformativeData = $this->informativeDataRepo->create($informativeData);

        $createdInformativeData = $createdInformativeData->toArray();
        $this->assertArrayHasKey('id', $createdInformativeData);
        $this->assertNotNull($createdInformativeData['id'], 'Created InformativeData must have id specified');
        $this->assertNotNull(InformativeData::find($createdInformativeData['id']), 'InformativeData with given id must be in DB');
        $this->assertModelData($informativeData, $createdInformativeData);
    }

    /**
     * @test read
     */
    public function test_read_informative_data()
    {
        $informativeData = factory(InformativeData::class)->create();

        $dbInformativeData = $this->informativeDataRepo->find($informativeData->id);

        $dbInformativeData = $dbInformativeData->toArray();
        $this->assertModelData($informativeData->toArray(), $dbInformativeData);
    }

    /**
     * @test update
     */
    public function test_update_informative_data()
    {
        $informativeData = factory(InformativeData::class)->create();
        $fakeInformativeData = factory(InformativeData::class)->make()->toArray();

        $updatedInformativeData = $this->informativeDataRepo->update($fakeInformativeData, $informativeData->id);

        $this->assertModelData($fakeInformativeData, $updatedInformativeData->toArray());
        $dbInformativeData = $this->informativeDataRepo->find($informativeData->id);
        $this->assertModelData($fakeInformativeData, $dbInformativeData->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_informative_data()
    {
        $informativeData = factory(InformativeData::class)->create();

        $resp = $this->informativeDataRepo->delete($informativeData->id);

        $this->assertTrue($resp);
        $this->assertNull(InformativeData::find($informativeData->id), 'InformativeData should not exist in DB');
    }
}
