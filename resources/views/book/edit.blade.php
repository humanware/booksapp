@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">Edit {{ $book->name }}</div>
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        <form action="{{ route('book.update', $book->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="bookname" class="form-label">Book Name</label>
                                <input type="text" class="form-control" id="bookname" name="bookname" placeholder="Enter book name" value="{{ $book->name}}">
                                @if($errors->has('bookname'))
                                <span class="text-danger">{{ $errors->first('bookname') }} </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="bookdescription" class="form-label">Book Description</label>
                                <textarea class="form-control" id="bookdescription" name="bookdescription" placeholder="Enter book description">{{ $book->description}}</textarea>
                                @if($errors->has('bookdescription'))
                                <span class="text-danger">{{ $errors->first('bookdescription') }} </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="bookcategory" class="form-label">Book Category</label>
                                <select name="bookcategory" class="form-select">
                                    <option value="">Select book category</option>
                                    <option @if($book->category == 'fictional') selected @endif value="fictional">Fictional Books</option>
                                    <option @if($book->category == 'biography') selected @endif value="biography">Biography Books</option>
                                    <option @if($book->category == 'comedy') selected @endif value="comedy">Comedy Books</option>
                                </select>
                                @if($errors->has('bookcategory'))
                                <span class="text-danger">{{ $errors->first('bookcategory') }} </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection