<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version August 26, 2020, 10:45 am UTC
 *
 * @property string $title_en
 * @property string $title_ar
 * @property string $description_en
 * @property string $description_ar
 * @property integer $category_id
 * @property integer $region_id
 * @property string $url
 * @property string $image
 * @property integer $status
 * @property integer $user_id
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'category_id',
        'region_id',

        'image',
        'image2',
        'image3',
        'image4',
        'image5',

        'english_pdf',
        'arabic_pdf',
        'type'
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
        'description_en' => 'string',
        'description_ar' => 'string',
        'category_id' => 'integer',
        'region_id' => 'integer',
        'url' => 'string',
        'image' => 'string',
        'image2' => 'string',
        'image3' => 'string',
        'image4' => 'string',
        'image5' => 'string',
        'status' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title_en' => 'required|string',
        'title_ar' => 'required|string',
        'description_en' => 'required|string',
        'description_ar' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'region_id' => 'required|exists:regions,id',
//        'url' => 'required|url',
        'image' => 'required|image',
//        'status' => 'required|in:1,2,3,4',
//        'user_id' => 'required|exists:users,id'
    ];

    /**
     * api create Validation rules
     *
     * @var array
     */
    public static $create_api_rules = [
        'title_en' => 'required|string',
        'title_ar' => 'required|string',
        'description_en' => 'required|string',
        'description_ar' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'region_id' => 'required|exists:regions,id',
        'url' => 'required|url',
        'image' => 'required|image',
    ];

    /**
     * api update Validation rules
     *
     * @var array
     */
    public static $update_api_rules = [
        'title_en' => 'required|string',
        'title_ar' => 'required|string',
        'description_en' => 'required|string',
        'description_ar' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'region_id' => 'required|exists:regions,id',
        // 'url' => 'required|url',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function region(){
        return $this->belongsTo('App\Models\Region', 'region_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
