<?php

namespace App\Helpers;


class FileUpload{

    public static function uploadFile($path, $file, $partName){

        $attach = $path . '/' .rand() . $partName . date("d-m-y-H-M") . '-' . $file->getClientOriginalName();

        $file->move($path, $attach);

        return $attach;
    }
}