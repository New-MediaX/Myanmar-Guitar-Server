<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\api\AlbumRepository;

class AlbumController extends Controller
{
    public function __construct(AlbumRepository $albumRepo)
    {
        $this->albumRepo = $albumRepo;
    }

    public function list()
    {
        return $this->albumRepo->list();
    }

    public function get($id)
    {
        return $this->albumRepo->get($id);
    }

    public function search(Request $request)
    {
        return $this->albumRepo->search($request->json()->all());
    }
}
