<?php

namespace App\Repositories\backend;
use App\Models\Album;
use App\Repositories\backend\CommonRepository;

class AlbumRepository {
    public function __construct(CommonRepository $commonRepo)
    {
        $this->commonRepo = $commonRepo;
    }

    public function getAll($request)
    {
        return Album::paginate(20);
    }

    public function all($request)
    {
        return Album::all();
    }

    public function get($id)
    {
        return Album::find($id);
    }
    
    public function addNew($inputs)
    {
        $data = [
            'album_name_en' => $inputs['album_name_en'],
            'album_name_mm' => $inputs['album_name_mm'],
        ];

        try {
            Album::create($data);
            return "Success";
        } catch (\Exception $e) {
            dd($e);
            return "Error Creating New Album!";
        }
    }

    public function update($inputs,$id)
    {
        $album = Album::findOrFail($id);

        $data = [
            'album_name_en' => $inputs['album_name_en'],
            'album_name_mm' => $inputs['album_name_mm'],
        ];

        try {
            $album->update($data);
            return "Success";
        } catch (\Exception $e) {
            dd($e);
            return "Error Updating New Album!";
        }
    }

    public function delete($id)
    {
        $album = Album::findOrFail($id);

        try {
            $album->delete();
            return "Success";
        } catch (\Exception $e) {
            return "Error Deleting New Album!";
        }
    }
}