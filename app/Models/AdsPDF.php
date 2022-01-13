<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdsPDF extends Model
{
    public $table = "ads_p_d_f_s";

    public $fillable = [
       'english_pdf','arabic_pdf','view_count','download_count'
    ];
}
