<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() {
        return response()->json(Genre::all(), 200);
    }

    public function store(Request $request) {
        $genre = Genre::create($request->all());
        return response()->json($genre, 201);
    }

    public function show($id) {
        $genre = Genre::find($id);
        return $genre ? response()->json($genre, 200) : response()->json(['message' => 'Not Found'], 404);
    }

    public function update(Request $request, $id) {
        $genre = Genre::find($id);
        if($genre) {
            $genre->update($request->all());
            return response()->json($genre, 200);
        }
        return response()->json(['message' => 'Not Found'], 404);
    }

    public function destroy($id) {
        $genre = Genre::find($id);
        if($genre) {
            $genre->delete();
            return response()->json(['message' => 'Deleted'], 200);
        }
        return response()->json(['message' => 'Not Found'], 404);
    }
}