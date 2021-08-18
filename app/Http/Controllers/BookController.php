<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        return "index page";
    }

    public function create() {
        return view('book.create');
    }

    public function store(Request $request) {
        Book::create([
            'name' => $request->bookname,
            'description' => $request->bookdescription,
            'category' => $request->bookcategory
        ]);

        return back();
    }
}
