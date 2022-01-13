<?php

namespace App\Repositories;

use App\Models\News;
use App\Http\Resources\News as NewsResource;
use App\Repositories\BaseRepository;

/**
 * Class NewsRepository
 * @package App\Repositories
 * @version August 26, 2020, 8:58 am UTC
*/

class NewsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title_en',
        'title_ar',
        'active'
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
        return News::class;
    }

    /**
     * get news for api
     */
    public function List(){
        $news = $this->model->latest()->where('active', 1)->get();

        return NewsResource::collection($news);
    }
    
     public function list_byoption(){

     /*  $news = $this->model->latest()->where('active', 1)->get();
      //dd($news);exit;
      $data= NewsResource::collection($news);
      $grouped = $data->groupBy('display_option')->flatten(1);;

    

      return($grouped->toArray()); */
      
      
      $header = $this->model->latest()->where('active', 1)->where('display_option',1)->get();
      $footer = $this->model->latest()->where('active', 1)->where('display_option',2)->get();
      $both = $this->model->latest()->where('active', 1)->where('display_option',3)->get();
     
      return (['header'=>NewsResource::collection($header) ,'footer'=>NewsResource::collection($footer),'both'=>NewsResource::collection($both)]);
     // return ([NewsResource::collection($header) ,NewsResource::collection($footer),NewsResource::collection($both)]);
    
    }
}
