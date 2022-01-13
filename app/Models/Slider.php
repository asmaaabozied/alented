<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Slider
 * @package App\Models
 * @version August 25, 2020, 9:19 am UTC
 *
 * @property string $title_en
 * @property string $title_ar
 * @property string $url
 * @property string $image
 */
class Slider extends Model
{
    use SoftDeletes;

    public $table = 'sliders';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title_en',
        'title_ar',
        'url',
        'image'
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
        'url' => 'string',
        'image' => 'string'
    ];

    /**
     * Create Validation rules
     *
     * @var array
     */
    public static $create_rules = [
//        'title_en' => 'required|string',
//        'title_ar' => 'required|string',
//        'url' => 'required|url',
        'image' => 'required|image'
    ];

    /**
     * Update Validation rules
     *
     * @var array
     */
    public static $update_rules = [
        'title_en' => 'required|string',
        'title_ar' => 'required|string',
        'url' => 'required|url'
    ];
}
