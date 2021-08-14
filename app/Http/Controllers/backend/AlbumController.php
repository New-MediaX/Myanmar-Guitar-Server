<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\albums\CreateAlbumRequest;
use App\Repositories\backend\AlbumRepository;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function __construct(AlbumRepository $albumRepo)
    {
        $this->albumRepo = $albumRepo;
    }

    public function list()
    {
        return view('app.albums.index');
    }

    public function getAll(Request $request)
    {
        return $this->albumRepo->getAll($request);
    }

    public function create()
    {
        return view('app.albums.create');
    }

    public function store(CreateAlbumRequest $request)
    {
        return $this->albumRepo->addNew($request->all());
    }

    public function get($id)
    {
        return $this->albumRepo->get($id);
    }

    public function edit($id)
    {
        return view('app.albums.edit');
    }

    public function update(CreateAlbumRequest $request,$id)
    {
        return $this->albumRepo->update($request->all(),$id);
    }

    public function delete($id)
    {
        return $this->albumRepo->delete($id);
    }
}
