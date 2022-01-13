<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ContentUs;

class ContentUsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_content_us()
    {
        $contentUs = factory(ContentUs::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/contentuses', $contentUs
        );

        $this->assertApiResponse($contentUs);
    }

    /**
     * @test
     */
    public function test_read_content_us()
    {
        $contentUs = factory(ContentUs::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/contentuses/'.$contentUs->id
        );

        $this->assertApiResponse($contentUs->toArray());
    }

    /**
     * @test
     */
    public function test_update_content_us()
    {
        $contentUs = factory(ContentUs::class)->create();
        $editedContentUs = factory(ContentUs::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/contentuses/'.$contentUs->id,
            $editedContentUs
        );

        $this->assertApiResponse($editedContentUs);
    }

    /**
     * @test
     */
    public function test_delete_content_us()
    {
        $contentUs = factory(ContentUs::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/contentuses/'.$contentUs->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/contentuses/'.$contentUs->id
        );

        $this->response->assertStatus(404);
    }
}
