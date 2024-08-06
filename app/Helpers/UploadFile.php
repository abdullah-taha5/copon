<?php

namespace App\Helpers;

trait UploadFile
{
    public function uploadFile($model, $colName, $collection_name)
    {
        $media = $model->addMediaFromRequest($colName)->toMediaCollection($collection_name);
        $media->wasRecentlyCreated = true;
    }
}
