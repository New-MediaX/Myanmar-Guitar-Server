<?php

namespace App\Repositories\api;

use App\Models\Song;

class SongRepository
{
    public function get($id)
    {
        return Song::findOrFail($id);
    }

    public function list()
    {
        $songs = Song::orderBy('updated_at','DESC')->paginate(50);
        foreach ($songs as $song) {
            $song->author;
            $song->album;
        }

        return $songs;
    }

    public function search($request)
    {
        $search_term = $request['searchTerm'];
        if ($search_term == "" | $search_term == null) {
            $songs = Song::orderBy('updated_at','DESC')->paginate(50);
            foreach ($songs as $song) {
                $song->author;
                $song->album;
            }

            return $songs;
        }

        $songs = Song::where("song_name_en", "LIKE", "%" . $search_term . "%")
            ->orWhere("song_name_mm", "LIKE", "%" . $search_term . "%")
            ->get();

        $this->getRelations($songs);

        return $songs;
    }

    public function getPopular()
    {
        $songs = Song::where("view_count", ">", "1500")->orderBy("updated_at", "DESC")->get();
        $this->getRelations($songs);

        return $songs;
    }

    public function getNewSongs()
    {
        $songs = Song::where("is_new", "=", "1")->orderBy("updated_at", "DESC")->take(100)->get();
        $this->getRelations($songs);
        return $songs;
    }

    public function getSongsByAlbum($id)
    {
        $songs = Song::where("album_id", "=", $id)->orderBy("updated_at", "DESC")->get();
        $this->getRelations($songs);
        return $songs;
    }

    public function getSongsByAuthor($id)
    {
        $songs = Song::where("author_id", "=", $id)->orderBy("updated_at", "DESC")->get();
        $this->getRelations($songs);
        return $songs;
    }

    public function getRelations($songs)
    {
        foreach ($songs as $song) {
            $song->author;
            $song->album;
        }
    }

    public function getFavoriteSongs($request)
    {
        $ids = $request['ids'];
        $songs = Song::whereIn("id", $ids )->get();

        $this->getRelations($songs);

        return $songs;
    }
}
