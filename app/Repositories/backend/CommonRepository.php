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

            $url = asset('storage/songs/' . $name);

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

            $url = asset('storage/songs/' . $name);

            return $url;
        } else {
            return $requestImage;
        } 
    }
    public function deleteImage($image_path){

        $realPath = str_replace($_SERVER['HTTP_ORIGIN'],"",$image_path);
        
        if(File::exists(public_path($realPath))){
            File::delete(public_path($realPath));
        }
        

    }
   
}
