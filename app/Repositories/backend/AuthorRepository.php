<?php

namespace App\Repositories\backend;
use App\Models\Author;
use App\Repositories\backend\CommonRepository;

class AuthorRepository {
    public function __construct(CommonRepository $commonRepo)
    {
        $this->commonRepo = $commonRepo;
    }

    public function getAll()
    {
        return Author::paginate(20);
    }

    public function get($id)
    {
        return Author::find($id);
    }
    
    public function addNew($inputs)
    {
        $data = [
            'author_name_en' => $inputs['author_name_en'],
            'author_name_mm' => $inputs['author_name_mm'],
        ];

        try {
            Author::create($data);
            return "Success";
        } catch (\Exception $e) {
            dd($e);
            return "Error Creating New Author!";
        }
    }

    public function update($inputs,$id)
    {
        $author = Author::findOrFail($id);

        $data = [
            'author_name_en' => $inputs['author_name_en'],
            'author_name_mm' => $inputs['author_name_mm'],
        ];

        try {
            $author->update($data);
            return "Success";
        } catch (\Exception $e) {
            dd($e);
            return "Error Updating New Author!";
        }
    }

    public function delete($id)
    {
        $author = Author::findOrFail($id);

        try {
            $author->delete();
            return "Success";
        } catch (\Exception $e) {
            return "Error Deleting New Author!";
        }
    }
}