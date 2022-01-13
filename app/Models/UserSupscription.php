<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSupscription extends Model
{
    public $table = 'user_supscriptions';

    public $fillable = [
        'user_id',
        'package_id',
        'start_date',
        'end_date',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'         => 'integer',
        'user_id'    => 'integer',
        'package_id' => 'string',
        'start_date' => 'string',
        'end_date'   => 'string',
        'price'      => 'string'
    ];

    public function package(){
        return $this->belongsTo('App\Models\Packages');
    }
}
