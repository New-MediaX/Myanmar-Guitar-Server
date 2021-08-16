<?php

namespace App\Repositories\api;
use App\Models\Author;

class AuthorRepository {
    public function get($id)
    {
        return Author::findOrFail($id);
    }

    public function list()
    {
        return Author::all();
    }

    public function search($request)
    {
        $search_term = $request['searchTerm'];
        if($search_term == "" | $search_term == null)
        {
            return [];
        }
        
        $authors = Author::where("author_name_en","LIKE","%".$search_term."%")
                        ->orWhere("author_name_mm","LIKE","%".$search_term."%")
                        ->get();
        return $authors;
    }
}