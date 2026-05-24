<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReviewController extends Controller
{
    public function index()
    {
        return view('reviews.index', ['reviews' => Review::all()]);
    }

    public function create()
    {
        return view('reviews.create', ['review' => new Review()]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'status' => [
        //         Rule::enum(Status::class)
        //         // ->only([Status::Draft, Status::Published])
        //     ],
        // ]);

        $b = new Review();
        $b->fill($request->only(['book_id', 'member_id', 'status', 'rate', 'body']))->save();
        return to_route('reviews.index');
    }

    public function show(Review $review)
    {
        return view('reviews.show', ['review' => $review]);
    }

    public function edit(Review $review)
    {
        return view('reviews.edit', ['review' => $review]);
    }

    public function update(Request $request, Review $review)
    {
        $review->fill($request->only(['book_id', 'member_id', 'status', 'rate', 'body']))->save();
        return to_route('reviews.index');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return to_route('reviews.index');
    }
}
