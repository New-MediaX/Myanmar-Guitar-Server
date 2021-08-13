<?php

namespace App\Http\Controllers\backend;

use App\Models\Album;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function list()
    {
        return view('app.albums.index');
    }

    public function getAll()
    {
        return Album::all();
    }

    public function create()
    {
        return view('app.albums.create');
    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request,$id)
    {

    }

    public function delete($id)
    {

    }
}
