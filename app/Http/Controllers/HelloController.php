<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HelloController extends Controller
{
    public function index()
    {
        return 'こんにちは、世界！';
    }

    public function show()
    {
        $data = [
            'message' => 'こんにちは、世界！',
        ];

        return view('hello.show', $data);
    }

    public function list()
    {
        $data = [
            'books' => Book::all(),
        ];

        return view('hello.list', $data);
    }

    public function conf()
    {
        return config('myapp.api_key').'／'.config('myapp.debug');
        // return Config::get('myapp.api_key') . '／' . Config::get('myapp.debug');
    }
}
