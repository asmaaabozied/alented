<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    public $table = "views";

    public $fillable = [
        'ip-address'
    ];
}
