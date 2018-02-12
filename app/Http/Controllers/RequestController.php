<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    //
    public function test1(Request $request)
    {
        return $request->input('name');
    }

    public function test2(Request $request, $name)
    {
        return $name;
    }

    public function test3(Request $request)
    {
        $url = $request->url();
        $fullurl = $request->fullUrl();
        $path = $request->path();
        echo $url . '<br>' . $fullurl . '<br>' . $path;
    }

    public function test4(Request $request)
    {
        $method = $request->method();
        return $method;
    }

    public function test5(Request $request)
    {
        if ($request->isMethod('post')) {
            return 'post';
        } else {
            return 'no';
        }
    }
}
