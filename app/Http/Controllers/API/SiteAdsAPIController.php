<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSiteAdsAPIRequest;
use App\Http\Requests\API\UpdateSiteAdsAPIRequest;
use App\Models\SiteAds;
use App\Repositories\SiteAdsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SiteAdsController
 * @package App\Http\Controllers\API
 */

class SiteAdsAPIController extends AppBaseController
{
    /** @var  SiteAdsRepository */
    private $siteAdsRepository;

    public function __construct(SiteAdsRepository $siteAdsRepo)
    {
        $this->siteAdsRepository = $siteAdsRepo;
    }

    /**
     * Display a listing of the SiteAds.
     * GET|HEAD /siteAds
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $siteAds = $this->siteAdsRepository->List($request);

        return $this->sendResponse(
            $siteAds,
            __('messages.retrieved', ['model' => __('models/siteAds.plural')])
        );
    }

    /**
     * Store a newly created SiteAds in storage.
     * POST /siteAds
     *
     * @param CreateSiteAdsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteAdsAPIRequest $request)
    {
        $input = $request->all();

        $siteAds = $this->siteAdsRepository->create($input);

        return $this->sendResponse(
            $siteAds->toArray(),
            __('messages.saved', ['model' => __('models/siteAds.singular')])
        );
    }

    /**
     * Display the specified SiteAds.
     * GET|HEAD /siteAds/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SiteAds $siteAds */
        $siteAds = $this->siteAdsRepository->find($id);

        if (empty($siteAds)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteAds.singular')])
            );
        }

        return $this->sendResponse(
            $siteAds->toArray(),
            __('messages.retrieved', ['model' => __('models/siteAds.singular')])
        );
    }

    /**
     * Update the specified SiteAds in storage.
     * PUT/PATCH /siteAds/{id}
     *
     * @param int $id
     * @param UpdateSiteAdsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteAdsAPIRequest $request)
    {
        $input = $request->all();

        /** @var SiteAds $siteAds */
        $siteAds = $this->siteAdsRepository->find($id);

        if (empty($siteAds)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteAds.singular')])
            );
        }

        $siteAds = $this->siteAdsRepository->update($input, $id);

        return $this->sendResponse(
            $siteAds->toArray(),
            __('messages.updated', ['model' => __('models/siteAds.singular')])
        );
    }

    /**
     * Remove the specified SiteAds from storage.
     * DELETE /siteAds/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SiteAds $siteAds */
        $siteAds = $this->siteAdsRepository->find($id);

        if (empty($siteAds)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/siteAds.singular')])
            );
        }

        $siteAds->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/siteAds.singular')])
        );
    }
}
