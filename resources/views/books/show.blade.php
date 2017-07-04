@extends('main')
@section('title', '| View Book')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>{{ $book->title }}</h1>
        <p class="lead">{{ $book->description }}</p>
        @foreach($book->reviews as $review)
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $review->comment }}</h2>
                    @for ($i=1; $i <= 5 ; $i++)
                    <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                    @endfor
                    {{-- {{ $review->user ? $review->user->name : 'Anonymous'}} <span class="pull-right">{{$review->timeago}}</span>
                    <p>{{{$review->comment}}}</p> --}}
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection