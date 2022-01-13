<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version August 24, 2020, 11:46 am UTC
 *
 * @property string $name_en
 * @property string $name_ar
 * @property integer $active
 * @property integer $home
 * @property string $image
 * @property string $pdf
 */
class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_ar',
        'active',
        'home',
        'image',
        'pdf'
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
        'active' => 'integer',
        'home' => 'integer',
        'image' => 'string',
        'pdf' => 'string'
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

    
}
