<?php

namespace App\Repositories\backend;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Illuminate\Support\Str;

class CommonRepository
{
    public function UploadImage($requestImage){
        if (Str::startsWith($requestImage, 'data:image')) {
            $image = $requestImage;

            $name = UuidV4::fromDateTime(now()) . '.jpg';

            $path = 'public/songs/' . $name;

            $img = Image::make($image);//->resize(320, 320);

            Storage::disk('local')->put($path, $img->encode());

            $url = asset('public/storage/songs/' . $name);

            return $url;
        } else {
            return $requestImage;
        }
    }
    public function updateImage($requestImage,$oldImg){
        if (Str::startsWith($requestImage, 'data:image')) {
            $this->deleteImage($oldImg);
            $image = $requestImage;

            $name = UuidV4::fromDateTime(now()) . '.jpg';

            $path = 'public/songs/' . $name;

            $img = Image::make($image);//->resize(320, 320);

            Storage::disk('local')->put($path, $img->encode());

            $url = asset('public/storage/songs/' . $name);

            return $url;
        } else {
            return $requestImage;
        } 
    }
    public function deleteImage($image_path){

        $realName = basename($image_path);

        if(Storage::disk('public')->exists('songs/'.$realName)){
            Storage::disk('public')->delete('songs/'.$realName);
        }
    }
   
}
