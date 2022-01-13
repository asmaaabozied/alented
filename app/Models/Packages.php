<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Packages
 * @package App\Models
 * @version August 25, 2020, 10:04 am UTC
 *
 * @property string $title_en
 * @property string $title_ar
 * @property integer $duration
 * @property integer $ads_number
 * @property integer $ads_url_number
 * @property integer $ad_charater_number
 * @property integer $price
 * @property integer $offer
 */
class Packages extends Model
{
    use SoftDeletes;

    public $table = 'packages';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title_en',
        'title_ar',
        'duration',
        'ads_number',
        'ads_url_number',
        'ad_charater_number',
        'price',
        'offer'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title_en' => 'string',
        'title_ar' => 'string',
        'duration' => 'integer',
        'ads_number' => 'integer',
        'ads_url_number' => 'integer',
        'ad_charater_number' => 'integer',
        'price' => 'integer',
        'offer' => 'integer'
    ];

    protected $appends = ['duration_text'];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title_en' => 'required|string',
        'title_ar' => 'required|string',
        'duration' => 'required|in:1,2,3,4,5,6',
        'ads_number' => 'required|numeric',
        'ads_url_number' => 'required|numeric',
        'ad_charater_number' => 'required|numeric',
        'price' => 'required|numeric',
    ];

    public function getDurationTextAttribute(){
        return trans('models/packages.duration_types.' . $this->duration);
    }
}
