<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Companies, User};
use Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $Companies = Companies::get();

        $TotalCompanies = Companies::count();
        $TotalUser = User::count();

        return view('home.index',compact('Companies','TotalCompanies','TotalUser'));
    }

}
