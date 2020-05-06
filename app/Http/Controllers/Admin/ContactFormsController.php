<?php

namespace App\Http\Controllers\Admin;

use App\ContactComment;
use App\ContactStatuses;
use App\ContactUS;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewContactComment;
use App\User;
use Genert\BBCode\BBCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class ContactFormsController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'contactAdmin']);
    }

    public function index()
    {
        $contactCases = ContactUS::all();

        return view('admin.contact.index', compact('contactCases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $member = User::find($contactCase->user_id);

        if(!$member){
            $member = new User(['id' => '0', 'name' => 'Deleted Account']);
        }

        $bbCode = new BBCode();
        $bbCode->addParser(
            'member',
            '/\{member}/s',
            $member->name,
            ''
        );

        $bbCode->addParser(
            'contact member',
            '/\{contactmember}/s',
            Auth::user()->name,
            ''
        );

        $bbCode->addParser(
            'role',
            '/\{contactrole}/s',
            Auth::user()->roles()->first()->name,
            ''
        );

        $code = $this->codeGenerator();

        $bbCode->addParser(
            'contact code',
            '/\{emailcode}/s',
            $code,
            ''
        );

        $bbCode->addParser(
            'custom-image',
            '/\{img\}(.*?)\{\/img\}/s',
            '<img class="contact-image" src="$1">',
            '$1'
        );

        $bbCode->addParser(
            'custom-new-line',
            '/\<br \/>/s',
            '',
            ''
        );

        $comments = $contactCase->comments;


        $statuses = ContactStatuses::all();
        $statuses_dropdown = ContactStatuses::where('id', '!=', 4)->get();

        return view('admin.contact.show')->with([

            'contactCase' => $contactCase,
            'comments' => $comments,
            'statuses' => $statuses,
            'statuses_drop' => $statuses_dropdown,

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
        $contactCase = ContactUS::findOrFail($id);
        $o_contactCase = ContactUS::findOrFail($id);

        //dd($request->claimed);

        if($request->claimed == 1) {
            $contactCase->assigned_id = Auth::id();
            $contactCase->status = "2";
        }else if($request->claimed == 0) {
            $contactCase->assigned_id = 0;
            $contactCase->status = "3";
        }

        if($request->status != null) {
            $status = ContactStatuses::where('name', $request->status)->first()->id;
            $contactCase->status = $status;
            $contactCase->assigned_id = $o_contactCase->assigned_id;
        }

        if($request->close > 0)
        {
            $contactCase->isClosed = $request->close;
            $contactCase->status = 4;
            $contactCase->assigned_id = $o_contactCase->assigned_id;
        }

        if($request->reopen > 0){

            $contactCase->isClosed = $request->reopen;
            $contactCase->status = 2;
            $contactCase->assigned_id = $o_contactCase->assigned_id;
        }

        $contactCase->save();

        return redirect()->route('admin.contact-tickets.show', ['id' => $contactCase->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contactCase = ContactUS::findOrFail($id);
        $contactCase->delete();

        return redirect()->route('admin.contact-tickets.index');
    }

    public function comment(NewContactComment $request)
    {
        $errors = new MessageBag();

        $newComment = New ContactComment();

        $ticket = ContactUS::FindOrFail($request->ticket_id);

        $user = User::findOrFail($ticket->user_id);

        $newComment->ticket_id = $request->ticket_id;
        $newComment->user_id = Auth::id();
        $newComment->comment = $request->comment;
        $newComment->admin = true;
        $newComment->save();

        $url = "https://infinitetruckers.com/contact-tickets/".$request->ticket_id;
        $greeting = "New contact Team Comment";

        return redirect()->route('admin.contact-tickets.show', $request->ticket_id)
            ->with('success',
                'Contact Comment Added.');
    }

    private function codeGenerator() {
        $length = 9;
        $str = "";
        $characters = array_merge(range('A','Z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
}
