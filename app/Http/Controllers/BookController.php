<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index', ['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create', ['book' => new Book]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book;
        $book->fill($request->only('isbn', 'title', 'price',
            'publisher', 'published', 'sample'))->save();

        return to_route('books.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(int $book)
    // {
    //     // $b = Book::find($book, ['*']);
    //     // $b = Book::findOr($book, ['*'], function () {
    //     //     abort(404);
    //     // });
    //     $b = Book::findOrFail($book);
    //     return view('books.show', ['book' => $b]);
    // }

    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->fill($request->only('isbn', 'title', 'price',
            'publisher', 'published', 'sample'))->save();
        return to_route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return to_route('books.index');
    }
}
