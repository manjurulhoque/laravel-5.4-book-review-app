@extends('main')

@section('title', '| All books')

@section('content')

    <a href="{{ route('books.create') }}" class="btn btn-warning">Create Book</a>
    
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-4">
                <h3><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></h3>
            </div>
        @endforeach
    </div>

@endsection