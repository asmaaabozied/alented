<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\InformativeData;

class InformativeDataApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_informative_data()
    {
        $informativeData = factory(InformativeData::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/informative_datas', $informativeData
        );

        $this->assertApiResponse($informativeData);
    }

    /**
     * @test
     */
    public function test_read_informative_data()
    {
        $informativeData = factory(InformativeData::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/informative_datas/'.$informativeData->id
        );

        $this->assertApiResponse($informativeData->toArray());
    }

    /**
     * @test
     */
    public function test_update_informative_data()
    {
        $informativeData = factory(InformativeData::class)->create();
        $editedInformativeData = factory(InformativeData::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/informative_datas/'.$informativeData->id,
            $editedInformativeData
        );

        $this->assertApiResponse($editedInformativeData);
    }

    /**
     * @test
     */
    public function test_delete_informative_data()
    {
        $informativeData = factory(InformativeData::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/informative_datas/'.$informativeData->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/informative_datas/'.$informativeData->id
        );

        $this->response->assertStatus(404);
    }
}
