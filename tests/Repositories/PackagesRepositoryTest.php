<?php namespace Tests\Repositories;

use App\Models\Packages;
use App\Repositories\PackagesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PackagesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PackagesRepository
     */
    protected $packagesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->packagesRepo = \App::make(PackagesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_packages()
    {
        $packages = factory(Packages::class)->make()->toArray();

        $createdPackages = $this->packagesRepo->create($packages);

        $createdPackages = $createdPackages->toArray();
        $this->assertArrayHasKey('id', $createdPackages);
        $this->assertNotNull($createdPackages['id'], 'Created Packages must have id specified');
        $this->assertNotNull(Packages::find($createdPackages['id']), 'Packages with given id must be in DB');
        $this->assertModelData($packages, $createdPackages);
    }

    /**
     * @test read
     */
    public function test_read_packages()
    {
        $packages = factory(Packages::class)->create();

        $dbPackages = $this->packagesRepo->find($packages->id);

        $dbPackages = $dbPackages->toArray();
        $this->assertModelData($packages->toArray(), $dbPackages);
    }

    /**
     * @test update
     */
    public function test_update_packages()
    {
        $packages = factory(Packages::class)->create();
        $fakePackages = factory(Packages::class)->make()->toArray();

        $updatedPackages = $this->packagesRepo->update($fakePackages, $packages->id);

        $this->assertModelData($fakePackages, $updatedPackages->toArray());
        $dbPackages = $this->packagesRepo->find($packages->id);
        $this->assertModelData($fakePackages, $dbPackages->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_packages()
    {
        $packages = factory(Packages::class)->create();

        $resp = $this->packagesRepo->delete($packages->id);

        $this->assertTrue($resp);
        $this->assertNull(Packages::find($packages->id), 'Packages should not exist in DB');
    }
}
