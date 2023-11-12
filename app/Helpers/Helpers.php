<?php

namespace App\Helpers;


function _imageUpload($image, $location)
{
    if (!empty($image) && !empty($location)) {
        // Product image upload PATH
        $path = storage_path('app/public/' . $location);
        // folder create
        !is_dir($path) && mkdir($path, 0777, true);
        // image name
        $productImageName = time() . mt_rand(10, 99) . '.' . $image->extension();
        // image store
        $image->storeAs('public/' . $location, $productImageName);
        return $productImageName;
    } else {
        return 'default.png';
    }
}