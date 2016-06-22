<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(20);
        return view('sysadmin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('sysadmin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('sysadmin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        $request['password'] = bcrypt($request['password']);
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        User::findOrFail($id)->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('/users');
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        return view('sysadmin.users.delete', compact('user'));
    }

    public function showChangePasswordForm()
    {
        if(Auth::check()) {
            $user = Auth::user();
            $page = 'sysadmin';

            if($user->user_type == 'System Administrator')
                $page = 'sysadmin';
            elseif($user->user_type == 'TVI Administrator')
                $page = 'tviadmin';
            elseif($user->user_type == 'Region Administrator')
                $page = 'rtaadmin';
            elseif($user->user_type == 'Cluster Administrator')
                $page = 'cluster_admin';

            return view('change_password', compact('user', 'page'));
        } else
            return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
                       'old_password' => 'required|min:5',
                        'password' => 'required|confirmed|min:6'
                    ]);

        if($validator->fails())
            return redirect()->back()->withErrors($validator->errors());


        $user = Auth::user();

        if(Hash::check($request->get('old_password'), $user->password))
        {
            $user->password = bcrypt($request->get('password'));
            $user->update();

            $request->session()->flash('alert-success', 'Password update successful!');
            return redirect('/change-password');
        } else {
            $request->session()->flash('alert-warning', 'Old password incorrect!');
            return redirect()->back();
        }

    }
}
