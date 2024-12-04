<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Main Page';
        $subtitle = '<i>Welcome</i>';
        $users = [
            'John Doe',
            'Jane Doe'
        ];
        return view('index', compact('title', 'subtitle', 'users'));
    }

    public function contacts()
    {
        return view('client.contacts');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email'=> 'required|email',
            'message' => 'required|min:3'
        ]);

        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        mail('lV3Bc@example.com', 'New message', "Name: $name\nEmail: $email\nMessage: $message");
        return 'Email sent';
    }
}
