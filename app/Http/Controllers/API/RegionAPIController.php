<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRegionAPIRequest;
use App\Http\Requests\API\UpdateRegionAPIRequest;
use App\Models\Region;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RegionController
 * @package App\Http\Controllers\API
 */

class RegionAPIController extends AppBaseController
{
    /** @var  RegionRepository */
    private $regionRepository;

    public function __construct(RegionRepository $regionRepo)
    {
        $this->regionRepository = $regionRepo;
    }

    /**
     * Display a listing of the Region.
     * GET|HEAD /regions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $regions = $this->regionRepository->List($request);

        return $this->sendResponse(
            $regions,
            __('messages.retrieved', ['model' => __('models/regions.plural')])
        );
    }

    /**
     * Store a newly created Region in storage.
     * POST /regions
     *
     * @param CreateRegionAPIRequest $request
     *
     * @return Response
     */
    // public function store(CreateRegionAPIRequest $request)
    // {
    //     $input = $request->all();

    //     $region = $this->regionRepository->create($input);

    //     return $this->sendResponse(
    //         $region->toArray(),
    //         __('messages.saved', ['model' => __('models/regions.singular')])
    //     );
    // }

    /**
     * Display the specified Region.
     * GET|HEAD /regions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     /** @var Region $region */
    //     $region = $this->regionRepository->find($id);

    //     if (empty($region)) {
    //         return $this->sendError(
    //             __('messages.not_found', ['model' => __('models/regions.singular')])
    //         );
    //     }

    //     return $this->sendResponse(
    //         $region->toArray(),
    //         __('messages.retrieved', ['model' => __('models/regions.singular')])
    //     );
    // }

    /**
     * Update the specified Region in storage.
     * PUT/PATCH /regions/{id}
     *
     * @param int $id
     * @param UpdateRegionAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateRegionAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var Region $region */
    //     $region = $this->regionRepository->find($id);

    //     if (empty($region)) {
    //         return $this->sendError(
    //             __('messages.not_found', ['model' => __('models/regions.singular')])
    //         );
    //     }

    //     $region = $this->regionRepository->update($input, $id);

    //     return $this->sendResponse(
    //         $region->toArray(),
    //         __('messages.updated', ['model' => __('models/regions.singular')])
    //     );
    // }

    /**
     * Remove the specified Region from storage.
     * DELETE /regions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var Region $region */
    //     $region = $this->regionRepository->find($id);

    //     if (empty($region)) {
    //         return $this->sendError(
    //             __('messages.not_found', ['model' => __('models/regions.singular')])
    //         );
    //     }

    //     $region->delete();

    //     return $this->sendResponse(
    //         $id,
    //         __('messages.deleted', ['model' => __('models/regions.singular')])
    //     );
    // }
}
