<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function showForm()
    {
        return view('reviews.form');
    }

    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:3',
            'rate' => 'required|integer|between:1,5',
        ]);

        $to = 'example@example.com';
        $subject = 'New Review Submission';
        $body = "Name: {$validated['name']}\nEmail: {$validated['email']}\nMessage: {$validated['message']}\nRating: {$validated['rate']}/5";
        $headers = "From: {$validated['email']}";

        if (mail($to, $subject, $body, $headers)) {
            return redirect('/reviews')->with('success', 'Review submitted successfully!');
        } else {
            return redirect('/reviews')->with('error', 'Failed to send email.');
        }
    }

}
