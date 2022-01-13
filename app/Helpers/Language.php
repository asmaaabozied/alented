<?php

namespace App\Helpers;


class Language{

    public static function getLanguage(){

        return request()->header('Accept-Language') != null ? request()->header('Accept-Language') : 'en';
    }
}