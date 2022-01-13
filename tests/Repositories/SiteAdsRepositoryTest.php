<?php namespace Tests\Repositories;

use App\Models\SiteAds;
use App\Repositories\SiteAdsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SiteAdsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SiteAdsRepository
     */
    protected $siteAdsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->siteAdsRepo = \App::make(SiteAdsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_site_ads()
    {
        $siteAds = factory(SiteAds::class)->make()->toArray();

        $createdSiteAds = $this->siteAdsRepo->create($siteAds);

        $createdSiteAds = $createdSiteAds->toArray();
        $this->assertArrayHasKey('id', $createdSiteAds);
        $this->assertNotNull($createdSiteAds['id'], 'Created SiteAds must have id specified');
        $this->assertNotNull(SiteAds::find($createdSiteAds['id']), 'SiteAds with given id must be in DB');
        $this->assertModelData($siteAds, $createdSiteAds);
    }

    /**
     * @test read
     */
    public function test_read_site_ads()
    {
        $siteAds = factory(SiteAds::class)->create();

        $dbSiteAds = $this->siteAdsRepo->find($siteAds->id);

        $dbSiteAds = $dbSiteAds->toArray();
        $this->assertModelData($siteAds->toArray(), $dbSiteAds);
    }

    /**
     * @test update
     */
    public function test_update_site_ads()
    {
        $siteAds = factory(SiteAds::class)->create();
        $fakeSiteAds = factory(SiteAds::class)->make()->toArray();

        $updatedSiteAds = $this->siteAdsRepo->update($fakeSiteAds, $siteAds->id);

        $this->assertModelData($fakeSiteAds, $updatedSiteAds->toArray());
        $dbSiteAds = $this->siteAdsRepo->find($siteAds->id);
        $this->assertModelData($fakeSiteAds, $dbSiteAds->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_site_ads()
    {
        $siteAds = factory(SiteAds::class)->create();

        $resp = $this->siteAdsRepo->delete($siteAds->id);

        $this->assertTrue($resp);
        $this->assertNull(SiteAds::find($siteAds->id), 'SiteAds should not exist in DB');
    }
}
