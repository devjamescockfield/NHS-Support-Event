<?php

namespace App\Http\Controllers;

use App\ContactUS;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::guest()) {

            return view('index');

        } else {

            $user = User::where('id', Auth::id())->first();

            return view('index', compact('user'));
        }
    }

    public function store(Request $request)
    {
        $user = User::where('id', Auth::id())->first();

        ContactUS::create([

            'name' => $user->name,
            'user_id' => $user->id,
            'email' => $user->email,
            'message' => $request->message,

        ]);

        return redirect()->route('contact.contact.index')
            ->with('flash_message',
                'Ticket Sent. We will get back to you as soon as possible');

    }
}
