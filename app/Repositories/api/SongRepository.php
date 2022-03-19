<?php

namespace App\Repositories\api;

use App\Models\Song;

class SongRepository
{
    public function get($id)
    {
        $song = Song::findOrFail($id);
        $song->update(['view_count' => $song->view_count + 1]);
        return $song;
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

        $songs = Song::select('songs.*')
            ->leftJoin('authors','songs.author_id','=','authors.id')
            ->where("authors.author_name_en", "LIKE", "%" . $search_term . "%")
            ->orWhere("authors.author_name_mm", "LIKE", "%" . $search_term . "%")
            ->orWhere("songs.song_name_en", "LIKE", "%" . $search_term . "%")
            ->orWhere("songs.song_name_mm", "LIKE", "%" . $search_term . "%")
            ->get();

        $this->getRelations($songs);

        return $songs;
    }

    public function getPopular()
    {
        // $songs = Song::where("is_popular","=", 1)->orderBy("updated_at", "DESC")->take(100)->get();
        $songs = Song::orderBy("view_count", "DESC")->take(100)->get();
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
