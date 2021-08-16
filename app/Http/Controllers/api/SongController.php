<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\api\SongRepository;

class SongController extends Controller
{
    public function __construct(SongRepository $songRepo)
    {
        $this->songRepo = $songRepo;
    }

    public function list()
    {
        return $this->songRepo->list();
    }

    public function get($id)
    {
        return $this->songRepo->get($id);
    }

    public function search(Request $request)
    {
        return $this->songRepo->search($request->json()->all());
    }

    public function getPopular()
    {
        return $this->songRepo->getPopular();
    }

    public function getNewSongs()
    {
        return $this->songRepo->getNewSongs();
    }

    public function getSongsByAlbum($albumId)
    {
        return $this->songRepo->getSongsByAlbum($albumId);
    }

    public function getSongsByAuthor($authorId)
    {
        return $this->songRepo->getSongsByAuthor($authorId);
    }
}
