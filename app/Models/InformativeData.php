<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InformativeData
 * @package App\Models
 * @version August 25, 2020, 7:35 am UTC
 *
 * @property string $about_en
 * @property string $about_ar
 * @property string $our_mission_en
 * @property string $our_mission_ar
 * @property string $privecy_policy_en
 * @property string $privecy_policy_ar
 * @property string $contact_email
 * @property string $phone_number
 * @property string $facebook_link
 * @property string $facebook_link
 * @property string $whatsapp_link
 * @property string $twitter_link
 * @property string $instgram_link
 */
class InformativeData extends Model
{
    use SoftDeletes;

    public $table = 'informative_datas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'about_en',
        'about_ar',
        'our_mission_en',
        'our_mission_ar',
        'privecy_policy_en',
        'privecy_policy_ar',
        'terms_conditions_en',
        'terms_conditions_ar',
        'contact_email',
        'phone_number',
        'facebook_link',
        'whatsapp_link',
        'twitter_link',
        'instgram_link',
        'free_ads_number',
        'english_pdf'=>'string',
        'arabic_pdf' =>'string',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'about_en' => 'string',
        'about_ar' => 'string',
        'our_mission_en' => 'string',
        'our_mission_ar' => 'string',
        'privecy_policy_en' => 'string',
        'privecy_policy_ar' => 'string',
        'contact_email' => 'string',
        'phone_number' => 'string',
        'facebook_link' => 'string',
        'whatsapp_link' => 'string',
        'twitter_link' => 'string',
        'instgram_link' => 'string',
        'english_pdf'=>'string',
        'arabic_pdf' =>'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'about_en' => 'required|string',
        'about_ar' => 'required|string',
        'our_mission_en' => 'required|string',
        'our_mission_ar' => 'required|string',
        'privecy_policy_en' => 'required|string',
        'privecy_policy_ar' => 'required|string',
        'terms_conditions_en' => 'required|string',
        'terms_conditions_ar' => 'required|string',
        'contact_email' => 'required|string',
        'phone_number' => 'required',
        'facebook_link' => 'required|url',
        'whatsapp_link' => 'required|url',
        'twitter_link' => 'required|url',
        'instgram_link' => 'required|url'
    ];

    
}
