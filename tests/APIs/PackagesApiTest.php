<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Packages;

class PackagesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_packages()
    {
        $packages = factory(Packages::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/packages', $packages
        );

        $this->assertApiResponse($packages);
    }

    /**
     * @test
     */
    public function test_read_packages()
    {
        $packages = factory(Packages::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/packages/'.$packages->id
        );

        $this->assertApiResponse($packages->toArray());
    }

    /**
     * @test
     */
    public function test_update_packages()
    {
        $packages = factory(Packages::class)->create();
        $editedPackages = factory(Packages::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/packages/'.$packages->id,
            $editedPackages
        );

        $this->assertApiResponse($editedPackages);
    }

    /**
     * @test
     */
    public function test_delete_packages()
    {
        $packages = factory(Packages::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/packages/'.$packages->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/packages/'.$packages->id
        );

        $this->response->assertStatus(404);
    }
}
