<?php

namespace App\Repositories\api;
use App\Models\Song;

class SongRepository {
    public function get($id)
    {
        return Song::findOrFail($id);
    }

    public function list()
    {
        return Song::paginate(50);
    }

    public function search($request)
    {
        $search_term = $request['searchTerm'];
        if($search_term == "" | $search_term == null)
        {
            return [];
        }

        $songs = Song::where("song_name_en","LIKE","%".$search_term."%")
                        ->orWhere("song_name_mm","LIKE","%".$search_term."%")
                        ->get();
        return $songs;
    }

    public function getPopular()
    {
        return Song::where("view_count",">","1500")->orderBy("updated_at","DESC")->get();   
    }

    public function getNewSongs()
    {
        return Song::where("is_new","=","1")->orderBy("updated_at","DESC")->take(100)->get();   
    }

    public function getSongsByAlbum($id)
    {
        return Song::where("album_id","=",$id)->orderBy("updated_at","DESC")->get();   
    }

    public function getSongsByAuthor($id)
    {
        return Song::where("author_id","=",$id)->orderBy("updated_at","DESC")->get();   
    }
}