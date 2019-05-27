<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePagesController extends Controller
{
    public function index(){

        return view('homePages.index');
    }

    public function admin(){
        return view('homePages.admin');
    }

}
