<?php

namespace App\Repositories;

use App\Models\InformativeData;
use App\Repositories\BaseRepository;
use App\Http\Resources\InformativeData as InformativeDataResource;

/**
 * Class InformativeDataRepository
 * @package App\Repositories
 * @version August 25, 2020, 7:35 am UTC
*/

class InformativeDataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'about_en',
        'about_ar',
        'our_mission_en',
        'our_mission_ar',
        'privecy_policy_en',
        'privecy_policy_ar',
        'contact_email',
        'phone_number',
        'facebook_link',
        'whatsapp_link',
        'twitter_link',
        'instgram_link'
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
        return InformativeData::class;
    }

    /**
     * Get Informative content
     */
    public function informative($input){
      
        if($input == "social_links"){
            $data = $this->model->select("facebook_link", "instgram_link", "whatsapp_link", 'twitter_link')->first();
        }elseif($input == "contact"){
            $data = $this->model->select("contact_email", "phone_number")->first();
        }else{
            $data = $this->model->select($input . '_en', $input . '_ar')->first();
        }
       
        
        return new InformativeDataResource($data);
    }
    
}
