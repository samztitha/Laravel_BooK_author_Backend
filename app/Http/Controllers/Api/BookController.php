<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;   // ✅ ADD THIS

class BookController extends Controller
{
    public function index()
    {
        return Book::with('author')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'author_id' => 'required|exists:authors,id',
            'title' => 'required|string',
            'genre' => 'nullable|string',
            'published_year' => 'nullable|integer',
        ]);

        return Book::create($data);
    }

    public function show(Book $book)
    {
        return $book->load('author');
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'author_id' => 'required|exists:authors,id',
            'title' => 'required|string',
            'genre' => 'nullable|string',
            'published_year' => 'nullable|integer',
        ]);

        $book->update($data);
        return $book;
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->noContent();
    }
}
