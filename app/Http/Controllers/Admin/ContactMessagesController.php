<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactMessages;
use Illuminate\Support\Facades\Auth;

class ContactMessagesController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'contactAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = ContactMessages::all();

        return view('admin.contact.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = nl2br(str_replace('\\r\\n', "\r\n", $request->message));

        ContactMessages::create([
            'description' =>  $request->description,
            'language' => $request->language,
            'message' => $message,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.contact-messages.index')
            ->with('success',
                'Preset contact Message Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = ContactMessages::findOrFail($id);

        return view('admin.contact.messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = ContactMessages::findOrFail($id);

        return view('admin.contact.messages.edit', compact('message'));
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
        $message = ContactMessages::findOrFail($id);

        $message->description = $request->description;
        $message->language = $request->language;
        $message->message = $request->message;

        $message->save();

        return redirect()->route('admin.contact-messages.index')
            ->with('success',
                'Preset contact Message Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = ContactMessages::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success',
                'Preset contact Message Deleted.');
    }
}
