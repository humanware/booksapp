@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">List of all books</div>
                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">E</th>
                                    <th scope="col">D</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = $books->perPage() * ($books->currentPage() - 1); ?>
                                @forelse($books as $book)
                                <tr>
                                    <td>
                                        @if($book->image)
                                            <img src="{{ Storage::url($book->image) }}" width="100" />
                                        @else
                                            <img src="/img/placeholder200x200.jpg" width="100" />
                                        @endif
                                    </td>
                                    <th scope="row">{{ ++$num }}</th>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->category }}</td>
                                    <td><a class="btn btn-sm btn-info" href="{{ route('book.edit', $book->id) }}">E</a></td>
                                    <td>
                                        <form action="{{ route('book.destroy', $book->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">D</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <p>No books to show</p>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection