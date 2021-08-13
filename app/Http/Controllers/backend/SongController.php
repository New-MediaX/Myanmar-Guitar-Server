<?php

namespace App\Http\Controllers\backend;

use App\Models\Song;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\songs\CreateSongRequest;
use App\Repositories\backend\SongRepository;

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

    public function getAll()
    {
        return $this->songRepo->getAll();
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

    public function update(CreateSongRequest $request,$id)
    {
        return $this->songRepo->update($request->all(),$id);
    }

    public function delete($id)
    {
        return $this->songRepo->delete($id);
    }
}
