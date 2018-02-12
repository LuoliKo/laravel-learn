<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class ShowProfile extends Controller
{
    //
    public function __invoke($id)
    {
        // TODO: Implement __invoke() method.
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}
