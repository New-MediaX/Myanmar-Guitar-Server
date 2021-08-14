<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\songs\CreateSongRequest;
use App\Http\Requests\songs\UpdateSongRequest;
use App\Repositories\backend\SongRepository;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function __construct(SongRepository $songRepo)
    {
        $this->songRepo = $songRepo;
    }

    public function list()
    {
        return view('app.songs.index');
    }

    public function getAll(Request $request)
    {
        return $this->songRepo->getAll($request);
    }

    public function create()
    {
        return view('app.songs.create');
    }

    public function store(CreateSongRequest $request)
    {
        return $this->songRepo->addNew($request->all());
    }

    public function get($id)
    {
        return $this->songRepo->get($id);
    }

    public function edit($id)
    {
        return view('app.songs.edit');
    }

    public function update(UpdateSongRequest $request,$id)
    {
        return $this->songRepo->update($request->all(),$id);
    }

    public function delete($id)
    {
        return $this->songRepo->delete($id);
    }
}
