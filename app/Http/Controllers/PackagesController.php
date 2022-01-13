<?php

namespace App\Http\Controllers;

use App\DataTables\PackagesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePackagesRequest;
use App\Http\Requests\UpdatePackagesRequest;
use App\Repositories\PackagesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PackagesController extends AppBaseController
{
    /** @var  PackagesRepository */
    private $packagesRepository;

    public function __construct(PackagesRepository $packagesRepo)
    {
        $this->packagesRepository = $packagesRepo;
    }

    /**
     * Display a listing of the Packages.
     *
     * @param PackagesDataTable $packagesDataTable
     * @return Response
     */
    public function index(PackagesDataTable $packagesDataTable)
    {
        return $packagesDataTable->render('packages.index');
    }

    /**
     * Show the form for creating a new Packages.
     *
     * @return Response
     */
    public function create()
    {
        return view('packages.create');
    }

    /**
     * Store a newly created Packages in storage.
     *
     * @param CreatePackagesRequest $request
     *
     * @return Response
     */
    public function store(CreatePackagesRequest $request)
    {
        $input = $request->all();

        $packages = $this->packagesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/packages.singular')]));

        return redirect(route('packages.index'));
    }

    /**
     * Display the specified Packages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $packages = $this->packagesRepository->find($id);

        if (empty($packages)) {
            Flash::error(__('models/packages.singular') . ' ' . __('messages.not_found'));

            return redirect(route('packages.index'));
        }

        return view('packages.show')->with('packages', $packages);
    }

    /**
     * Show the form for editing the specified Packages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $packages = $this->packagesRepository->find($id);

        if (empty($packages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/packages.singular')]));

            return redirect(route('packages.index'));
        }

        return view('packages.edit')->with('packages', $packages);
    }

    /**
     * Update the specified Packages in storage.
     *
     * @param int $id
     * @param UpdatePackagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePackagesRequest $request)
    {
        $packages = $this->packagesRepository->find($id);

        if (empty($packages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/packages.singular')]));

            return redirect(route('packages.index'));
        }

        $packages = $this->packagesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/packages.singular')]));

        return redirect(route('packages.index'));
    }

    /**
     * Remove the specified Packages from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $packages = $this->packagesRepository->find($id);

        if (empty($packages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/packages.singular')]));

            return redirect(route('packages.index'));
        }

        $this->packagesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/packages.singular')]));


        return back();

    }
}
