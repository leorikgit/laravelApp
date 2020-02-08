<?php

namespace App\Http\Controllers;

use App\Avatar;
use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $userRequest)
    {

        $input = $userRequest->all();
        $user = User::create($input);

       $file = $userRequest->file('file');

       $input['orginal_name'] = $file->getClientOriginalName();
       $input['type'] = $file->getClientOriginalExtension();
       $input['size'] = $file->getSize();
       $input['unique_id'] = time();
       $input['name'] = $input['unique_id'] . '_' . $user->id.'.'.$input['type'];

       $file->move('upload/avatars', $input['name']);
        $user->avatar()->create($input);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findORFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.user.edit', compact('user', 'roles'));
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
//        $validatedData = $request->validate([
//            'name' => 'required',
//            'email' => 'required',
//
//        ]);
        $input = $request->all();

        if(trim($input['password']) == '') {
            $input = $request->except('password');
        }


        $user = User::findOrFail($id);
        $user->update($input);

        if($file = $request->file('file')){
            $avatar = ($user->avatar) ? $user->avatar : new Avatar();

            $avatar->orginal_name = $file->getClientOriginalName();
            $avatar->type = $file->getClientOriginalExtension();
            $avatar->size = $file->getSize();
            $avatar->unique_id = time();
            $avatar->name = $avatar->unique_id . '_' . $user->id. '.' . $avatar->type;

            $file->move('upload/images', $avatar->name);
            $user->avatar()->save($avatar);
        }
        // Session::flash('success', 'User has been updated!');

        return redirect()->route('admin.users.index')->with('alert-success', 'User has been updated!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->avatar){
            unlink(public_path().$user->avatar->name);
            $user->avatar()->delete();
            $user->delete();
        }
        Session::flash('success', 'User has been deleted!');
        return redirect()->route('admin.users.index');
    }
}
