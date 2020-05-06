<?php

namespace App\Http\Controllers\Admin;

use App\PositionChange;
use App\User;
use App\UserLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Auth;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);//isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index')->with([
            'users' => $users,
            ]);
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
        $user = User::findOrFail($id);

        $roles = $this->grabAllowedRolls();

        return view('admin.users.show')->with([

            'user' => $user,
            'roles' => $roles,

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
        $user = User::findOrFail($id);

        if(!empty($request->role)) {
            $previousRoles = $user->getRoleNames();

            foreach ($previousRoles as $oldRole) {
                $previousRole = $oldRole;
            }

            $role = $request->role; //Retreive all roles

            if (isset($role)) {
                $user->roles()->sync($role);  //If one or more role is selected associate user to roles
            }
            else {
                $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
            }
        }

        if($user->id == Auth::user()->id){

            return redirect('/');

        }
        else{

            return back()
                ->with('success',
                    'User successfully edited.');

        }
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

    public function grabAllowedRolls()
    {
        /* Gets users role name */
        $userRole = Auth()->user()->roles()->pluck('name')->implode(' ');

        /* Finds the role by name to get the id */
        $staffRole = Role::findByName($userRole);

        /* Counts all the roles within the database */
        $lastRole = Role::all()->count();

        /* Gathers roles between these roles using the first role order and the total of roles */
        $roles = Role::WhereBetween('order', array($staffRole->order + 1, $lastRole))->orderBy('order', 'desc')->get();

        return $roles;
    }
}
