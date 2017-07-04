<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use App\Review;

use Validator;
use Auth;

class ReviewController extends Controller
{
    public function createReview(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'bail|required|max:255|min:3',
            'rating' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $book = Book::find($id);
        $review = new Review();
        $review->book_id = $book->id;
        $review->user_id = Auth::check() ? Auth::user()->id : 0;
        $review->rating = $request->rating;
        $review->comment = $request->comment;

        $review->save();

        return redirect()->route('books.show', $id);
    }
}
