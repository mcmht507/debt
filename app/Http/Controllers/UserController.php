<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dispUser(Request $req)
    {
        // login user get
        $user_id = Auth::id();
        // login user's debt get
        $user = User::find($user_id);
        return view('userUpdate', ['user' => $user]);
    }

    /**
     * user update
     * 
     */
    public function update(Request $req)
    {
        // login user get
        $user_id = Auth::id();
        // login user's debt get
        $form = $req->all();
        $user = User::find($user_id);
        $user->fill($form)->save();

        return view('userUpdate', ['user' => $user]);
    }}
