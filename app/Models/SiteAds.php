<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SiteAds
 * @package App\Models
 * @version September 13, 2020, 8:53 am UTC
 *
 * @property string $image
 * @property string $url
 */
class SiteAds extends Model
{
    use SoftDeletes;

    public $table = 'site_ads';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'image',
        'url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'required|image',
        'url' => 'url'
    ];

    
}
