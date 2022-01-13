<?php

namespace App\Repositories;

use App\Models\SiteAds;
use App\Repositories\BaseRepository;
use App\Helpers\FileUpload;
use App\Http\Resources\SiteAds as SiteAdsResource;

/**
 * Class SiteAdsRepository
 * @package App\Repositories
 * @version September 13, 2020, 8:53 am UTC
*/

class SiteAdsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'url'
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
        return SiteAds::class;
    }

    /**
     * create model record
     * 
     * @param array $input
     * 
     * @return SiteAds
     */
    public function create($input){
        if(request()->hasFile('image')){
            $input['image'] = FileUpload::uploadFile('upload/SiteAds', request()->file('image'), '-siteAds-');
        }

        $siteAds = $this->model;
        $siteAds->fill($input)->save();

        return $siteAds;
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
            $input['image'] = FileUpload::uploadFile('upload/SiteAds', request()->file('image'), '-siteAds-');
        }

        $siteAds = $this->model->findorFail($id);
        $siteAds->fill($input)->save();

        return $siteAds;
    }

    /**
     * site Ads list
     */
    public function List($request){
        $siteAds = $this->model->latest()->get();

        return SiteAdsResource::collection($siteAds);
    }
}
