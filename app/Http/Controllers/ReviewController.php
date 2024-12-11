<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.form', compact('reviews'));
    }



    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:3',
            'rate' => 'required|integer|between:1,5',
        ]);

        Review::create($validated);

        return redirect('/reviews')->with('success', 'Review added successfully!');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:3',
            'rate' => 'required|integer|between:1,5',
        ]);

        $review = Review::findOrFail($id);
        $review->update($validated);

        return redirect('/reviews')->with('success', 'Review updated successfully!');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect('/reviews')->with('success', 'Review deleted successfully!');
    }
}
