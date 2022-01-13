<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Region
 * @package App\Models
 * @version August 24, 2020, 1:41 pm UTC
 *
 * @property string $name_en
 * @property string $name_ar
 * @property string $image
 */
class Region extends Model
{
    use SoftDeletes;

    public $table = 'regions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_ar',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name_en' => 'string',
        'name_ar' => 'string',
        'image' => 'string'
    ];

    /**
     * Create Validation rules
     *
     * @var array
     */
    public static $create_rules = [
        'name_en' => 'required|string',
        'name_ar' => 'required|string',
        'image' => 'required|image'
    ];

    /**
     * Update Validation rules
     * 
     * @var array
     */
    public static $update_rules = [
        'name_en'  => 'required|string',
        'name_ar'  => 'required|string'
    ];

    public function products(){
        return $this->hasMany('App\Models\Product', 'region_id')->where('end_date', '>=', today()->format('Y-m-d'));
    }

    public function productsCount(){
        return $this->products->where('status', 3)->count();
    }
}
