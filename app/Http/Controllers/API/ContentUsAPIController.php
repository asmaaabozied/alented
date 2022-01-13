<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContentUsAPIRequest;
use App\Http\Requests\API\UpdateContentUsAPIRequest;
use App\Models\ContentUs;
use App\Repositories\ContentUsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContentUsController
 * @package App\Http\Controllers\API
 */

class ContentUsAPIController extends AppBaseController
{
    /** @var  ContentUsRepository */
    private $contentUsRepository;

    public function __construct(ContentUsRepository $contentUsRepo)
    {
        $this->contentUsRepository = $contentUsRepo;
    }

    /**
     * Display a listing of the ContentUs.
     * GET|HEAD /contentuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $contentuses = $this->contentUsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $contentuses->toArray(),
            __('messages.retrieved', ['model' => __('models/contentuses.plural')])
        );
    }

    /**
     * Store a newly created ContentUs in storage.
     * POST /contentuses
     *
     * @param CreateContentUsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateContentUsAPIRequest $request)
    {
        $input = $request->all();

        $contentUs = $this->contentUsRepository->create($input);

        return $this->sendResponse(
            $contentUs->toArray(),
            __('messages.saved', ['model' => __('models/contentuses.singular')])
        );
    }

    /**
     * Display the specified ContentUs.
     * GET|HEAD /contentuses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContentUs $contentUs */
        $contentUs = $this->contentUsRepository->find($id);

        if (empty($contentUs)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/contentuses.singular')])
            );
        }

        return $this->sendResponse(
            $contentUs->toArray(),
            __('messages.retrieved', ['model' => __('models/contentuses.singular')])
        );
    }

    /**
     * Update the specified ContentUs in storage.
     * PUT/PATCH /contentuses/{id}
     *
     * @param int $id
     * @param UpdateContentUsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContentUsAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContentUs $contentUs */
        $contentUs = $this->contentUsRepository->find($id);

        if (empty($contentUs)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/contentuses.singular')])
            );
        }

        $contentUs = $this->contentUsRepository->update($input, $id);

        return $this->sendResponse(
            $contentUs->toArray(),
            __('messages.updated', ['model' => __('models/contentuses.singular')])
        );
    }

    /**
     * Remove the specified ContentUs from storage.
     * DELETE /contentuses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ContentUs $contentUs */
        $contentUs = $this->contentUsRepository->find($id);

        if (empty($contentUs)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/contentuses.singular')])
            );
        }

        $contentUs->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/contentuses.singular')])
        );
    }
}
