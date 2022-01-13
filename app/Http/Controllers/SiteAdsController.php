<?php

namespace App\Http\Controllers;

use App\DataTables\SiteAdsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSiteAdsRequest;
use App\Http\Requests\UpdateSiteAdsRequest;
use App\Repositories\SiteAdsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SiteAdsController extends AppBaseController
{
    /** @var  SiteAdsRepository */
    private $siteAdsRepository;

    public function __construct(SiteAdsRepository $siteAdsRepo)
    {
        $this->siteAdsRepository = $siteAdsRepo;
    }

    /**
     * Display a listing of the SiteAds.
     *
     * @param SiteAdsDataTable $siteAdsDataTable
     * @return Response
     */
    public function index(SiteAdsDataTable $siteAdsDataTable)
    {
        return $siteAdsDataTable->render('site_ads.index');
    }

    /**
     * Show the form for creating a new SiteAds.
     *
     * @return Response
     */
    public function create()
    {
        return view('site_ads.create');
    }

    /**
     * Store a newly created SiteAds in storage.
     *
     * @param CreateSiteAdsRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteAdsRequest $request)
    {
        $input = $request->all();

        $siteAds = $this->siteAdsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/siteAds.singular')]));

        return redirect(route('siteAds.index'));
    }

    /**
     * Display the specified SiteAds.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $siteAds = $this->siteAdsRepository->find($id);

        if (empty($siteAds)) {
            Flash::error(__('models/siteAds.singular').' '.__('messages.not_found'));

            return redirect(route('siteAds.index'));
        }

        return view('site_ads.show')->with('siteAds', $siteAds);
    }

    /**
     * Show the form for editing the specified SiteAds.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $siteAds = $this->siteAdsRepository->find($id);

        if (empty($siteAds)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteAds.singular')]));

            return redirect(route('siteAds.index'));
        }

        return view('site_ads.edit')->with('siteAds', $siteAds);
    }

    /**
     * Update the specified SiteAds in storage.
     *
     * @param  int              $id
     * @param UpdateSiteAdsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteAdsRequest $request)
    {
        $siteAds = $this->siteAdsRepository->find($id);

        if (empty($siteAds)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteAds.singular')]));

            return redirect(route('siteAds.index'));
        }

        $siteAds = $this->siteAdsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/siteAds.singular')]));

        return redirect(route('siteAds.index'));
    }

    /**
     * Remove the specified SiteAds from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $siteAds = $this->siteAdsRepository->find($id);

        if (empty($siteAds)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteAds.singular')]));

            return redirect(route('siteAds.index'));
        }

        $this->siteAdsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/siteAds.singular')]));

        return redirect(route('siteAds.index'));
    }
}
