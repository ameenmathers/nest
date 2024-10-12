<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

class FileUploadService
{
    public function upload(UploadedFile $file, $folder)
    {
        $fileName = $file->getClientOriginalName();
        $file->storeAs($folder, $fileName);
        return url("$folder/$fileName");
    }
}
