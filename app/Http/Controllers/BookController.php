<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookStoreRequest;

class BookController extends Controller
{
    public function index() {
        $books = Book::get();
        return view('book.index', compact('books'));
    }

    public function create() {
        return view('book.create');
    }

    public function store(BookStoreRequest $request) {
        Book::create([
            'name' => $request->bookname,
            'description' => $request->bookdescription,
            'category' => $request->bookcategory
        ]);

        return back()->with('success', 'New book added successfully');
    }
}
