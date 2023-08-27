<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;

class DynamicPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function viewHomePage()
    {
        return view('public.index');
    }
}