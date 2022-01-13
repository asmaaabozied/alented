<?php

namespace App\Http\Controllers;

use App\DataTables\InformativeDataDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInformativeDataRequest;
use App\Http\Requests\UpdateInformativeDataRequest;
use App\Repositories\InformativeDataRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InformativeDataController extends AppBaseController
{
    /** @var  InformativeDataRepository */
    private $informativeDataRepository;

    public function __construct(InformativeDataRepository $informativeDataRepo)
    {
        $this->informativeDataRepository = $informativeDataRepo;
    }

    /**
     * Display a listing of the InformativeData.
     *
     * @param InformativeDataDataTable $informativeDataDataTable
     * @return Response
     */
    public function index(InformativeDataDataTable $informativeDataDataTable)
    {
        return $informativeDataDataTable->render('informative_datas.index');
    }

    /**
     * Show the form for creating a new InformativeData.
     *
     * @return Response
     */
    public function create()
    {
        return view('informative_datas.create');
    }

    /**
     * Store a newly created InformativeData in storage.
     *
     * @param CreateInformativeDataRequest $request
     *
     * @return Response
     */
    public function store(CreateInformativeDataRequest $request)
    {
        $input = $request->all();

        $informativeData = $this->informativeDataRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/informativeDatas.singular')]));

        return redirect(route('informativeDatas.index'));
    }

    /**
     * Display the specified InformativeData.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $informativeData = $this->informativeDataRepository->find($id);

        if (empty($informativeData)) {
            Flash::error(__('models/informativeDatas.singular').' '.__('messages.not_found'));

            return redirect(route('informativeDatas.index'));
        }

        return view('informative_datas.show')->with('informativeData', $informativeData);
    }

    /**
     * Show the form for editing the specified InformativeData.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $informativeData = $this->informativeDataRepository->find($id);

        if (empty($informativeData)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informativeDatas.singular')]));

            return redirect(route('informativeDatas.index'));
        }

        return view('informative_datas.edit')->with('informativeData', $informativeData);
    }

    /**
     * Update the specified InformativeData in storage.
     *
     * @param  int              $id
     * @param UpdateInformativeDataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformativeDataRequest $request)
    {
        $informativeData = $this->informativeDataRepository->find($id);

        if (empty($informativeData)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informativeDatas.singular')]));

            return redirect(route('informativeDatas.index'));
        }

        $informativeData = $this->informativeDataRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/informativeDatas.singular')]));

        return redirect(route('informativeDatas.index'));
    }

    /**
     * Remove the specified InformativeData from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $informativeData = $this->informativeDataRepository->find($id);

        if (empty($informativeData)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informativeDatas.singular')]));

            return redirect(route('informativeDatas.index'));
        }

        $this->informativeDataRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/informativeDatas.singular')]));

        return redirect(route('informativeDatas.index'));
    }
}
