@extends('main')

@section('title', '| All books')

@section('stylesheets')
    <style type="text/css">
        .my-stars
        {
            font-size: 20px;
            color: #fff703;
        }
    </style>
@endsection

@section('content')

    <a href="{{ route('books.create') }}" class="btn btn-warning">Create Book</a>
    
    @foreach($books->chunk(3) as $items)
        <div class="row">
            @foreach ($items as $book)
                <div class="col-md-4">
                    <div class="well">
                        <img 
                        src="{{asset($book->cover ? '/images/' . $book->cover : '/images/' . "default.png")}}" class="img-responsive" />
                        <h3><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></h3>
                        <?php $sum = 0; $avg = 0; ?>
                        @if($book->reviews->count())
                            @foreach ($book->reviews as $r)
                                <?php $sum += $r->rating; ?>
                            @endforeach
                            <?php $avg = floatval($sum / $book->reviews->count());  ?>
                            {{number_format((float)$avg, 2, '.', '')}} stars
                            <p class="pull-left">
                            @for ($i=1; $i <= 5 ; $i++)
                            <span class="my-stars glyphicon glyphicon-star{{ ($i <= $avg) ? '' : '-empty'}}"></span>
                            @endfor
                        @else
                            @for ($i=1; $i <= 5 ; $i++)
                            <span class="my-stars glyphicon glyphicon-star{{ ($i <= 0) ? '' : '-empty'}}"></span>
                            @endfor
                        @endif
                        <p class="pull-right">{{ $book->reviews->count() }} reviews</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection