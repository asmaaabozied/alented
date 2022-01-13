<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\User;
use App\Models\InformativeData;
use App\Helpers\FileUpload;
use App\Repositories\BaseRepository;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductDetails;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;


/**
 * Class ProductRepository
 * @package App\Repositories
 * @version August 26, 2020, 10:45 am UTC
*/

class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'category_id',
        'region_id',
        'url',
        'image',
        'image2',
        'image3',
        'image4',
        'image5',
        'status',
        'user_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }

    /**
     * create model record
     *
     * @param array $input
     *
     * @return Product
     */
    public function create($input){
       // dd($input);exit;
        if(request()->hasFile('image')){
            $input['image'] = FileUpload::uploadFile('upload/Produt', request()->file('image'), '-product-');
        }

         if(request()->hasFile('image2')){
            $input['image2'] = FileUpload::uploadFile('upload/Produt', request()->file('image2'), '-product-');
        }
        if(request()->hasFile('image3')){
            $input['image3'] = FileUpload::uploadFile('upload/Produt', request()->file('image3'), '-product-');
        }
        if(request()->hasFile('image4')){
            $input['image4'] = FileUpload::uploadFile('upload/Produt', request()->file('image4'), '-product-');
        }
        if(request()->hasFile('image5')){
            $input['image5'] = FileUpload::uploadFile('upload/Produt', request()->file('image5'), '-product-');
        }


        if(request()->hasFile('english_pdf')){
            $input['english_pdf'] = FileUpload::uploadFile('upload/Product', request()->file('english_pdf'), '-product-');
        }
        if(request()->hasFile('arabic_pdf')){
            $input['arabic_pdf'] = FileUpload::uploadFile('upload/Product', request()->file('arabic_pdf'), '-product-');
        }

        if(!isset($input['user_id'])){
            $input['user_id'] = Auth::user()->id;
        }

        if(!isset($input['status'])){
            $input['status'] = 1;
        }

        $user_ads_count = $this->model->where('user_id', $input['user_id'])->count();
        $free_ads_limit = InformativeData::select('free_ads_number')->first()->free_ads_number;

        $user = User::find($input['user_id']);
        // dd($user->Subscribtion->ads_number);
        if(($user->Subscribtion != null && $user_ads_count < ($user->Subscribtion->package->ads_number + $free_ads_limit)) || $user_ads_count < $free_ads_limit){
            $product = $this->model;
            $product->fill($input)->save();

            return $product;
        }

        return false;
    }

    /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     *
     */
    public function update($input, $id){
        if(request()->hasFile('image')){
            $input['image'] = FileUpload::uploadFile('upload/Product', request()->file('image'), '-product-');
        }

        if(request()->hasFile('image2')){
            $input['image2'] = FileUpload::uploadFile('upload/Produt', request()->file('image2'), '-product-');
        }
        if(request()->hasFile('image3')){
            $input['image3'] = FileUpload::uploadFile('upload/Produt', request()->file('image3'), '-product-');
        }
        if(request()->hasFile('image4')){
            $input['image4'] = FileUpload::uploadFile('upload/Produt', request()->file('image4'), '-product-');
        }
        if(request()->hasFile('image5')){
            $input['image5'] = FileUpload::uploadFile('upload/Produt', request()->file('image5'), '-product-');
        }

        if(request()->hasFile('english_pdf')){
            $input['english_pdf'] = FileUpload::uploadFile('upload/Product', request()->file('english_pdf'), '-product-');
        }
        if(request()->hasFile('arabic_pdf')){
            $input['arabic_pdf'] = FileUpload::uploadFile('upload/Product', request()->file('arabic_pdf'), '-product-');
        }

        if(!isset($input['status'])){
            $input['status'] = 1;
        }

        $product = $this->model->findorFail($id);
        $product->fill($input)->save();



        return $product;
    }

    /**
     * parent products list
     */
    public function List($request){
        $products = $this->model;

        if(isset($request->owner) && !empty($request->owner)){

            // dd($products->get()->toArray());

            if(isset($request->status) && !empty($request->status)){
                $products = $products->where('status', $request->status);
            }

            if(isset($request->period) && !empty($request->period)){
                // dd(today()->format('Y-m-d') > "2020-09-08");
                if($request->period == "current"){
                    $products = $products->where(function ($query) {
                        $query->where('end_date', '>', today()->format('Y-m-d'))
                            ->orWhereNull('end_date');
                    });
                    // $products = $products->where('end_date', '>', today()->format('Y-m-d'))->orWhere('end_date', null);
                }
                if($request->period == "previous"){
                    $products = $products->where('end_date', '<', today()->format('Y-m-d'))->where('end_date', '!=', null);
                }

            }

            $products = $products->where('user_id', Auth::user()->id)->where('end_date', '>=', today()->format('Y-m-d'));
        }else{
            $products = $products->where('status', 3)->where('end_date', '>=', today()->format('Y-m-d'));
        }

        if(isset($request->category_id) && !empty($request->category_id)){
            $products = $products->where('category_id', $request->category_id)->where('end_date', '>=', today()->format('Y-m-d'));
        }

        if(isset($request->region_id) && !empty($request->region_id)){
            $products = $products->where('region_id', $request->region_id)->where('end_date', '>=', today()->format('Y-m-d'));
        }

        if(isset($request->type) && !empty($request->type)){
            $products = $products->where('type', $request->type)->where('end_date', '>=', today()->format('Y-m-d'));
        }

        if(isset($request->sort_by) && !empty($request->sort_by)){
            $sort_type = isset($request->sort_type) && in_array($request->sort_type, ['desc', 'asc']) ? $request->sort_type : 'desc';
            $products = $products->where('end_date', '>=', today()->format('Y-m-d'))->orderBy($request->sort_by, $sort_type);
        }else{
            $products = $products->where('end_date', '>=', today()->format('Y-m-d'))->latest();
        }

        $products = $products->paginate(10);

        $data = ProductResource::collection($products);
        $products = $products->toArray();
        $products['data']       = $data;

        return $products;
    }

    /**
     * get 1 product with id
     */
    public function find($id, $columns = ['*']){
        $product = $this->model->find($id);

        return new ProductDetails($product);
    }

    /**
     * Get Products Count for Dashboard
     *
     * @return int
     */
    public function count(){
        $products = $this->model->where('status', 1)->count();

        return $products;
    }

    public function today(){
        $today_products = $this->model->latest()->whereDate('created_at', Carbon::today())->with('specialization', 'user')->get();

        return $today_products;
    }

    public function delete_productimage($input)
    {
        $user_id = Auth::user()->id;

        if($user_id)
        {
            $images=[];
            $product=$this->model->where('id',$input['product_id'])->where('user_id',$user_id)->first();
            foreach($input['image'] as $image)
            {
               $images[$image]='';

               if(isset($input['image_path']))
               {
                    if(file_exists(url($input['image_path']))){

                            File::delete(url($input['image_path']));
                        }
               }

            }
         if($product)
          {
            $product->fill($images)->save();
          }
            return $product;
        }




    }
}
