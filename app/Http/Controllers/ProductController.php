<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\RegionRepository;
use App\Repositories\ClientRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;
    /** @var  CategoryRepository */
    private $categoryRepository;
    /** @var  RegionRepository */
    private $regionRepository;
    /** @var  ClientRepository */
    private $clientRepository;

    public function __construct(ProductRepository $productRepo, CategoryRepository $categoryRepo,
                                RegionRepository $regionRepo, ClientRepository $clientRepo)
    {
        $this->productRepository    = $productRepo;
        $this->categoryRepository   = $categoryRepo;
        $this->regionRepository     = $regionRepo;
        $this->clientRepository     = $clientRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param ProductDataTable $productDataTable
     * @return Response
     */
    public function index(ProductDataTable $productDataTable)
    {
        return $productDataTable->render('products.index');
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->pluck();
        $regions    = $this->regionRepository->pluck();
        $users      = $this->clientRepository->pluck();

        return view('products.create')->with(['categories' => $categories, 'regions' => $regions, 'users' => $users]);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {

        $input = $request->all();

       // dd($input);exit;

        $rules = [
             'english_pdf' => 'mimes:pdf',
             'arabic_pdf' => 'mimes:pdf'

        ];


        $request->validate($rules);
        $product = $this->productRepository->create($input + ['type'=>'product']);

        Flash::success(__('messages.saved', ['model' => __('models/products.singular')]));

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(__('models/products.singular').' '.__('messages.not_found'));

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(__('messages.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('products.index'));
        }

        $categories = $this->categoryRepository->pluck();
        $regions    = $this->regionRepository->pluck();
        $users      = $this->clientRepository->pluck();

        return view('products.edit')->with(['product' => $product, 'categories' => $categories, 'regions' => $regions, 'users' => $users]);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);



        if (empty($product)) {
            Flash::error(__('messages.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('products.index'));
        }

        $rules = [
             'english_pdf' => 'mimes:pdf',
             'arabic_pdf' => 'mimes:pdf'

        ];


        $request->validate($rules);
        $product = $this->productRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/products.singular')]));

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(__('messages.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/products.singular')]));

      return back();
    }
}
