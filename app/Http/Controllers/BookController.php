<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        return response()->json(Book::with('genre')->get(), 200);
    }

    public function store(Request $request) {
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    public function show($id) {
        $book = Book::with('genre')->find($id);
        return $book ? response()->json($book, 200) : response()->json(['message' => 'Not Found'], 404);
    }

    public function update(Request $request, $id) {
        $book = Book::find($id);
        if($book) {
            $book->update($request->all());
            return response()->json($book, 200);
        }
        return response()->json(['message' => 'Not Found'], 404);
    }

    public function destroy($id) {
        $book = Book::find($id);
        if($book) {
            $book->delete();
            return response()->json(['message' => 'Deleted'], 200);
        }
        return response()->json(['message' => 'Not Found'], 404);
    }
}