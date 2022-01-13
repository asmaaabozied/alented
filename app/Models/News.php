<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class News
 * @package App\Models
 * @version August 26, 2020, 8:58 am UTC
 *
 * @property string $title_en
 * @property string $title_ar
 * @property integer $active
 */
class News extends Model
{
    use SoftDeletes;

    public $table = 'news';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title_en',
        'title_ar',
        'display_option',
        'active'
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
        'display_option'=>'integer',
        'active' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */

     protected $appends = ['displayoption_text'];
     
    public static $rules = [
        'title_en' => 'required|string',
        'title_ar' => 'required|string',
        'display_option'=>'required|integer'
    ];

    public function getDisplayoptionTextAttribute(){
        return trans('models/news.display_options.' . $this->display_option);
    }

    
}
