<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;   // ✅ ADD THIS

class AuthorController extends Controller
{
    public function index()
    {
        return Author::with('books')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email|unique:authors',
            'bio' => 'nullable|string',
        ]);

        return Author::create($data);
    }

    public function show(Author $author)
    {
        return $author->load('books');
    }

    public function update(Request $request, Author $author)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email|unique:authors,email,' . $author->id,
            'bio' => 'nullable|string',
        ]);

        $author->update($data);
        return $author;
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return response()->noContent();
    }
}
