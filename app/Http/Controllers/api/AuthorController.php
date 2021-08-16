<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\api\AuthorRepository;

class AuthorController extends Controller
{
    public function __construct(AuthorRepository $authorRepo)
    {
        $this->authorRepo = $authorRepo;
    }

    public function list()
    {
        return $this->authorRepo->list();
    }

    public function get($id)
    {
        return $this->authorRepo->get($id);
    }
    
    public function search(Request $request)
    {
        return $this->authorRepo->search($request->json()->all());
    }
}
