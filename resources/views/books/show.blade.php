@extends('main')
@section('title', '| View Book')
@section('stylesheets')
<style type="text/css">
.animated {
-webkit-transition: height 0.2s;
-moz-transition: height 0.2s;
transition: height 0.2s;
}
.stars
{
margin: 20px 0;
font-size: 24px;
color: #fff703;
}
.my-stars
{
margin: 20px 0;
font-size: 24px;
color: #fff703;
}
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-center well">
            <img
            src="{{asset($book->cover ? '/images/' . $book->cover : '/images/' . "default.png")}}" style="margin-left: 35%" class="img-responsive" width="300px" height="300px" />
            <h1>{{ $book->title }}</h1>
            <p class="lead">{{ $book->description }}</p>
        </div>
        <div class="row" style="margin-top:40px;">
            <div class="col-md-12">
                <div class="well well-sm">
                    <div class="text-right">
                        <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
                    </div>
                    <div class="row" id="post-review-box" style="display:none;">
                        <div class="col-md-12">
                            <form action="{{ route('create.review', $book->id) }}" accept-charset="UTF-8" action="" method="post">
                                {{csrf_field()}}
                                <input id="ratings-hidden" name="rating" type="hidden">
                                <textarea required class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>
                                
                                <div class="text-right">
                                    <div class="stars starrr" data-rating="{{ old('rating') }}"></div>
                                    <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                        <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                        <button class="btn btn-success btn-lg" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($book->reviews as $review)
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $review->comment }}</h2>
                    @if($review->created_at)
                    <h3>{{ $review->created_at->diffForHumans() }} time ago</h3>
                    @endif
                    @for ($i=1; $i <= 5 ; $i++)
                    <span class="my-stars glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                    @endfor
                    {{-- {{ $review->user ? $review->user->name : 'Anonymous'}} <span class="pull-right">{{$review->timeago}}</span>
                    <p>{{{$review->comment}}}</p> --}}
                </div>
            </div>
            @endforeach
        </div>
        @endsection
        @section('scripts')
        <script src="{{asset('js/star-custom.js')}}"></script>
        @endsection