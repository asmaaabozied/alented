<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Helpers\FileUpload;
use App\Http\Resources\Category as CategoryResource;
/**
 * Class CategoryRepository
 * @package App\Repositories
 * @version August 24, 2020, 11:46 am UTC
*/

class CategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
        'name_ar',
        'active',
        'home',
        'image',
        'pdf'
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
        return Category::class;
    }

    /**
     * create model record
     * 
     * @param array $input
     * 
     * @return Category
     */
    public function create($input){
        if(request()->hasFile('image')){
            $input['image'] = FileUpload::uploadFile('upload/Category', request()->file('image'), '-category-');
        }

        $category = new Category();
        $category->fill($input)->save();

        return $category;
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
            $input['image'] = FileUpload::uploadFile('upload/Category', request()->file('image'), '-category-');
        }

        $category = Category::findorFail($id);
        $category->fill($input)->save();

        return $category;
    }

    /**
     * parent categories list
     */
    public function List($request){
        $categories = $this->model->latest()->where('active', 1);

        if($request->all == null){
            $categories = $categories->where('home', 1);
        }

        $categories = $categories->get();
        return CategoryResource::collection($categories);
    }

    /**
     * pluck categories for listing
     */
    public function pluck(){
        $categories = $this->model->latest()->where('active', 1)->pluck('name_en', 'id')->toArray();

        return $categories;
    }
}
