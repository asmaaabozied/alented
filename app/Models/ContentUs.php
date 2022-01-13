<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContentUs
 * @package App\Models
 * @version August 31, 2020, 11:58 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $message
 */
class ContentUs extends Model
{
    use SoftDeletes;

    public $table = 'contentuses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'phone_number',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'phone_number' => 'required|numeric',
        'message' => 'required|string'
    ];

    
}
