<?php

namespace App\Repositories\backend;
use App\Models\Song;
use App\Repositories\backend\CommonRepository;

class SongRepository {
    public function __construct(CommonRepository $commonRepo)
    {
        $this->commonRepo = $commonRepo;
    }

    public function getAll()
    {
        $songs = Song::paginate(20);
        foreach ($songs as $song) {
            $song->author;
            $song->album;
        }

        return $songs;
    }

    public function all()
    {
        $songs = Song::all();
        foreach ($songs as $song) {
            $song->author;
            $song->album;
        }

        return $songs;
    }

    public function get($id)
    {
        return Song::find($id);
    }
    
    public function addNew($inputs)
    {
        $file = $this->commonRepo->UploadImage($inputs['image']);

        $data = [
            'author_id' => $inputs['author_id'],
            'album_id' => $inputs['album_id'],
            'song_name_en' => $inputs['song_name_en'],
            'song_name_mm' => $inputs['song_name_mm'],
            'file' => $file,
            'is_new' => $inputs['is_new'],
            'is_popular' => $inputs['is_popular'],
            'view_count' => 0
        ];
        try {
            $song = Song::create($data);
            return "Success";
        } catch (\Exception $e) {
            dd($e);
            $this->commonRepo->deleteImage($file);
            return "Error Creating New Song!";
        }
    }

    public function update($inputs,$id)
    {
        $song = Song::findOrFail($id);
        $new_image = "";
        if($inputs['new_image'] !== null)
        {
            $new_image = $this->commonRepo->UploadImage($inputs['new_image']);
            dd($new_image);
        }

        $data = [
            'author_id' => $inputs['author_id'],
            'album_id' => $inputs['album_id'],
            'song_name_en' => $inputs['song_name_en'],
            'song_name_mm' => $inputs['song_name_mm'],
            'is_new' => $inputs['is_new'],
            'is_popular' => $inputs['is_popular'],
        ];

        if($inputs['new_image'] !== null)
        {
            $data["file"] = $new_image;
        } else {
            $data["file"] = $song->file;
        }

        try {
            $song->update($data);
            if($inputs['new_image'] !== null)
            {
                $this->commonRepo->deleteImage($song->file);
            }
            return "Success";
        } catch (\Exception $e) {
            dd($e);
            return "Error Updating New Song!";
        }
    }

    public function delete($id)
    {
        $song = Song::findOrFail($id);
        
        try {
            $this->commonRepo->deleteImage($song->file);
            $song->delete();
            return "Success";
        } catch (\Exception $e) {
            return "Error Deleting New Song!";
        }
    }
}