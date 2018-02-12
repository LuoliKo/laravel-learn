<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AfterHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('token');
        $this->middleware('auth')->only('show');
        $this->middleware(AfterHandler::class)->except('show');
        $this->middleware(function ($request, $next) {
            return $next($request);
        });
    }

    public function show()
    {
        $user = DB::table('users')->first();
        dd($user);
    }
}
