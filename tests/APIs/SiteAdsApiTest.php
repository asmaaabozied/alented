<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SiteAds;

class SiteAdsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_site_ads()
    {
        $siteAds = factory(SiteAds::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/site_ads', $siteAds
        );

        $this->assertApiResponse($siteAds);
    }

    /**
     * @test
     */
    public function test_read_site_ads()
    {
        $siteAds = factory(SiteAds::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/site_ads/'.$siteAds->id
        );

        $this->assertApiResponse($siteAds->toArray());
    }

    /**
     * @test
     */
    public function test_update_site_ads()
    {
        $siteAds = factory(SiteAds::class)->create();
        $editedSiteAds = factory(SiteAds::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/site_ads/'.$siteAds->id,
            $editedSiteAds
        );

        $this->assertApiResponse($editedSiteAds);
    }

    /**
     * @test
     */
    public function test_delete_site_ads()
    {
        $siteAds = factory(SiteAds::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/site_ads/'.$siteAds->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/site_ads/'.$siteAds->id
        );

        $this->response->assertStatus(404);
    }
}
