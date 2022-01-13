<?php

namespace App\Http\Controllers;

use App\DataTables\ContentUsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateContentUsRequest;
use App\Http\Requests\UpdateContentUsRequest;
use App\Repositories\ContentUsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ContentUsController extends AppBaseController
{
    /** @var  ContentUsRepository */
    private $contentUsRepository;

    public function __construct(ContentUsRepository $contentUsRepo)
    {
        $this->contentUsRepository = $contentUsRepo;
    }

    /**
     * Display a listing of the ContentUs.
     *
     * @param ContentUsDataTable $contentUsDataTable
     * @return Response
     */
    public function index(ContentUsDataTable $contentUsDataTable)
    {
        return $contentUsDataTable->render('contentuses.index');
    }

    /**
     * Show the form for creating a new ContentUs.
     *
     * @return Response
     */
    public function create()
    {
        return view('contentuses.create');
    }

    /**
     * Store a newly created ContentUs in storage.
     *
     * @param CreateContentUsRequest $request
     *
     * @return Response
     */
    public function store(CreateContentUsRequest $request)
    {
        $input = $request->all();

        $contentUs = $this->contentUsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/contentuses.singular')]));

        return redirect(route('contentuses.index'));
    }

    /**
     * Display the specified ContentUs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contentUs = $this->contentUsRepository->find($id);

        if (empty($contentUs)) {
            Flash::error(__('models/contentuses.singular').' '.__('messages.not_found'));

            return redirect(route('contentuses.index'));
        }

        return view('contentuses.show')->with('contentUs', $contentUs);
    }

    /**
     * Show the form for editing the specified ContentUs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contentUs = $this->contentUsRepository->find($id);

        if (empty($contentUs)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contentuses.singular')]));

            return redirect(route('contentuses.index'));
        }

        return view('contentuses.edit')->with('contentUs', $contentUs);
    }

    /**
     * Update the specified ContentUs in storage.
     *
     * @param  int              $id
     * @param UpdateContentUsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContentUsRequest $request)
    {
        $contentUs = $this->contentUsRepository->find($id);

        if (empty($contentUs)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contentuses.singular')]));

            return redirect(route('contentuses.index'));
        }

        $contentUs = $this->contentUsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/contentuses.singular')]));

        return redirect(route('contentuses.index'));
    }

    /**
     * Remove the specified ContentUs from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contentUs = $this->contentUsRepository->find($id);

        if (empty($contentUs)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contentuses.singular')]));

            return redirect(route('contentuses.index'));
        }

        $this->contentUsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/contentuses.singular')]));

        return redirect(route('contentuses.index'));
    }
}
