<?php

namespace App\Http\Controllers;

use App\ContactComment;
use App\ContactUS;
use App\Http\Requests\NewContactComment;
use App\Notifications\ContactNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;

class ContactController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactCases = ContactUS::where('user_id', Auth::id())->orderBy('id', 'desc')->get();

        return view('contact.index', compact('contactCases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('id', Auth::id())->first();

        return view('contact.create')->with([

            'user' => $user,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactCase = ContactUS::findOrFail($id);

        if(Auth::id() != $contactCase->user_id){
            abort('401');
        }

        $comments = $contactCase->comments;

        return view('contact.show')->with([

            'contactCase' => $contactCase,
            'comments' => $comments,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function comment(NewContactComment $request)
    {
        $newComment = New ContactComment();

        $ticket = ContactUS::findOrFail($request->ticket_id);

        $newComment->ticket_id = $ticket->id;
        $newComment->user_id = Auth::id();
        $newComment->comment = $request->comment;
        $newComment->save();

//        $url = "https://epilepsyevent.com/contact-ticket/".$ticket->id;
//        $greeting = "New Contact Comment";
//
//        $user = User::find($ticket->assigned_id);
//
//        if($user){
//            $user->notify(new ContactNotification($url, $greeting));
//        }

        return redirect()->route('contact.contact.show', $ticket->id)
            ->with('success',
                'Contact Comment Added.');
    }

    public function tickets()
    {
        $contactCases = ContactUS::where('user_id', Auth::id())->orderBy('id', 'desc')->get();

        $user = User::findorfail(Auth::id());

        return view('contact.tickets', compact('contactCases', 'user'));
    }
}
