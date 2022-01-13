<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductAPIRequest;
use App\Http\Requests\API\UpdateProductAPIRequest;
use App\Http\Requests\CreateNewsLetter;
use App\Models\Newletter;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use Response;
use Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class ProductController
 * @package App\Http\Controllers\API
 */
class ProductAPIController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     * GET|HEAD /products
     *
     * @param Request $request
     * @return Response
     */

    public function showdate(){


        $date=Product::orderBy('created_at','desc')->select('id','created_at')->first();

        return $this->sendResponse(
            $date,
            __('messages.retrieved', ['model' => __('models/products.plural')])
        );


    }


    public function add_newletter(CreateNewsLetter $request)
    {


        $letter = Newletter::create(['email' => $request->email]);

        if ($request->header('Accept-Language') ==  'en'){
//            if ($request->header(‘Accept-Language’, 'en')) {

            $data = 'The newsletter has been successfully subscribed, and you will receive all new updates';


        } elseif ($request->header('Accept-Language') ==  'ar') {
            $data = 'تم الإشتراك فى النشرة البريدية بنجاح وسيصلك كل جديد';


        }


        Mail::to($request->email)->send(new \App\Mail\MailMessage($data));

        return $this->sendResponse(
            $letter,
            __('messages.retrieved', ['model' => __('models/products.letter')])
        );


    }

    public function index(Request $request)
    {
        $products = $this->productRepository->List($request);

        return $this->sendResponse(
            $products,
            __('messages.retrieved', ['model' => __('models/products.plural')])
        );
    }

    /**
     * Store a newly created Product in storage.
     * POST /products
     *
     * @param CreateProductAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductAPIRequest $request)
    {
        $input = $request->all();

        $product = $this->productRepository->create($input);

        if ($product == false) {
            return $this->sendError(
                __('messages.not_allowed')
            );
        }

        return $this->sendResponse(
            $product->toArray(),
            __('messages.saved', ['model' => __('models/products.singular')])
        );
    }

    /**
     * Display the specified Product.
     * GET|HEAD /products/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Product $product */
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/products.singular')])
            );
        }

        return $this->sendResponse(
            $product,
            __('messages.retrieved', ['model' => __('models/products.singular')])
        );
    }

    /**
     * Update the specified Product in storage.
     * PUT/PATCH /products/{id}
     *
     * @param int $id
     * @param UpdateProductAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductAPIRequest $request)
    {
        $input = $request->all();

        /** @var Product $product */
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/products.singular')])
            );
        }

        $product = $this->productRepository->update($input, $id);
        $product = $this->productRepository->find($id);


        return $this->sendResponse(
            $product,
            __('messages.updated', ['model' => __('models/products.singular')])
        );
    }

    /**
     * Remove the specified Product from storage.
     * DELETE /products/{id}
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $user = Auth::user();
        /** @var Product $product */
        $product = $this->productRepository->find($id);

        if (empty($product) || $product->user_id != $user->id) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/products.singular')])
            );
        }

        $product->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/products.singular')])
        );
    }

    public function delete_productimage(Request $request)
    {

        $input = $request->all();

        $product = $this->productRepository->delete_productimage($input);

        if (empty($product)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/products.fields.image')])
            );
        }
        return $this->sendResponse(
            $product->toArray(),
            __('messages.deleted', ['model' => __('models/products.fields.image')])
        );
    }
}
