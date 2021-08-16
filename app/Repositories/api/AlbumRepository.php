<?php

namespace App\Repositories\api;
use App\Models\Album;

class AlbumRepository {
    public function get($id)
    {
        return Album::findOrFail($id);
    }

    public function list()
    {
        return Album::all();
    }

    public function search($request)
    {
        $search_term = $request['searchTerm'];
        if($search_term == "" | $search_term == null)
        {
            return [];
        }
        
        $albums = Album::where("album_name_en","LIKE","%".$search_term."%")
                        ->orWhere("album_name_mm","LIKE","%".$search_term."%")
                        ->get();
        return $albums;
    }
}