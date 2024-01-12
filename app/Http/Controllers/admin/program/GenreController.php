<?php

namespace App\Http\Controllers\admin\program;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function storeGenre(Request $request)
    {
        $data = $request->all();
        $genre = Genre::create([
            'genre' => $data['genre'],
            'is_visible' => 'show'
        ]);
    }

    public function listGenres()
    {
        $genres_list = Genre::select('id', 'genre')->get();
        return response()->json(['genres_list' => $genres_list]);
    }

    public function deleteGenre(Request $request)
    {
        $id = $request->id;
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return response()->json(200);
    }
}
