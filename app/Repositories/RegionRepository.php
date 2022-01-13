<?php

namespace App\Repositories;

use App\Models\Region;
use App\Repositories\BaseRepository;
use App\Helpers\FileUpload;
use App\Http\Resources\Region as RegionResource;

/**
 * Class RegionRepository
 * @package App\Repositories
 * @version August 24, 2020, 1:41 pm UTC
*/

class RegionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
        'name_ar',
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
        return Region::class;
    }

    /**
     * create model record
     * 
     * @param array $input
     * 
     * @return Region
     */
    public function create($input){
        if(request()->hasFile('image')){
            $input['image'] = FileUpload::uploadFile('upload/Region', request()->file('image'), '-region-');
        }

        $region = $this->model;
        $region->fill($input)->save();

        return $region;
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
            $input['image'] = FileUpload::uploadFile('upload/Region', request()->file('image'), '-region-');
        }

        $region = $this->model->findorFail($id);
        $region->fill($input)->save();

        return $region;
    }

    /**
     * parent regions list
     */
    public function List($request){
        $regions = $this->model->latest();
        
        

        $regions = $regions->get();
        
        return RegionResource::collection($regions);
    }

    /**
     * pluck regions for listing
     */
    public function pluck(){
        $regions = $this->model->latest()->pluck('name_en', 'id')->toArray();

        return $regions;
    }
}
