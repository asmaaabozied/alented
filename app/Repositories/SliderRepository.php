<?php

namespace App\Repositories;

use App\Models\Slider;
use App\Repositories\BaseRepository;
use App\Helpers\FileUpload;
use App\Http\Resources\Slider as SliderResource;

/**
 * Class SliderRepository
 * @package App\Repositories
 * @version August 25, 2020, 9:19 am UTC
*/

class SliderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title_en',
        'title_ar',
        'url',
        'image'
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
        return Slider::class;
    }

    /**
     * create model record
     * 
     * @param array $input
     * 
     * @return Slider
     */
    public function create($input){
        if(request()->hasFile('image')){
            $input['image'] = FileUpload::uploadFile('upload/Slider', request()->file('image'), '-slider-');
        }

        $slider = $this->model;
        $slider->fill($input)->save();

        return $slider;
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
            $input['image'] = FileUpload::uploadFile('upload/Slider', request()->file('image'), '-slider-');
        }

        $slider = $this->model->findorFail($id);
        $slider->fill($input)->save();

        return $slider;
    }

    /**
     * parent categories list
     */
    public function List($request){
        $slides = $this->model->latest()->get();

        return SliderResource::collection($slides);
    }
}
