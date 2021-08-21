<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookStoreRequest;

class BookController extends Controller
{
    public function index() {
        $books = Book::paginate(5);
        return view('book.index', compact('books'));
    }

    public function create() {
        return view('book.create');
    }

    public function store(BookStoreRequest $request) {
        $image = $request->file('bookimage')->store('public/product');
        Book::create([
            'name' => $request->bookname,
            'description' => $request->bookdescription,
            'category' => $request->bookcategory,
            'image' => $image,
        ]);

        return back()->with('success', 'New book added successfully');
    }

    public function edit($id) {
        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }

    public function update(Request $request,$id) {
        $book = Book::find($id);

        $book->name = $request->bookname;
        $book->description = $request->bookdescription;
        $book->category = $request->bookcategory;

        $book->save();

        return redirect()->route('book.index')->with('message', 'Book updated successfully');
    }

    public function destroy($id) {
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('book.index')->with('message', 'Book Deleted Successfully');
    }
}
