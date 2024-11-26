<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('book-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:books,title'],
            'author' => ['required', 'string', 'max:100'],
            'genre' => ['required', 'string'],
            'published_year' => ['required', 'integer', 'digits:4', 'min:1900', 'max:' . date('Y')],
        ]);

        Book::create($validated);
    }
}
