<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\authors\CreateAuthorRequest;
use App\Repositories\backend\AuthorRepository;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct(AuthorRepository $authorRepo)
    {
        $this->authorRepo = $authorRepo;
    }

    public function list()
    {
        return view('app.authors.index');
    }

    public function getAll(Request $request)
    {
        return $this->authorRepo->getAll($request);
    }

    public function all(Request $request)
    {
        return $this->authorRepo->all($request);
    }

    public function create()
    {
        return view('app.authors.create');
    }

    public function store(CreateAuthorRequest $request)
    {
        return $this->authorRepo->addNew($request->all());
    }

    public function get($id)
    {
        return $this->authorRepo->get($id);
    }

    public function edit($id)
    {
        return view('app.authors.edit');
    }

    public function update(CreateAuthorRequest $request,$id)
    {
        return $this->authorRepo->update($request->all(),$id);
    }

    public function delete($id)
    {
        return $this->authorRepo->delete($id);
    }

    public function search(Request $request)
    {
        return $this->authorRepo->search($request);
    }
}
