<?php

namespace App\Http\Controllers\Admin;

use App\ContactStatuses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactStatusesController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'contactAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $statuses = ContactStatuses::all();

        return view('admin.contact.statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.contact.statuses.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'color'     => 'required',
        ]);

        $category = new ContactStatuses();
        $category->create(['name' => $request->name, 'color' => $request->color]);
        return redirect()->route('admin.contact-statuses.index');
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $status = ContactStatuses::findOrFail($id);

        return view('admin.contact.statuses.show', compact('status'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $status = ContactStatuses::findOrFail($id);
        return view('admin.contact.statuses.edit', compact('status'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'color'     => 'required',
        ]);
        $status = ContactStatuses::findOrFail($id);
        $status->update(['name' => $request->name, 'color' => $request->color]);


        return redirect()->route('admin.contact-statuses.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $status = ContactStatuses::findOrFail($id);
        $status->delete();

        return redirect()->route('admin.contact-statuses.index');
    }
}
