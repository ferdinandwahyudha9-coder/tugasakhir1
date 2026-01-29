<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form(){
        return view('form');
    }
    public function kontak(){
        return view('kontak');
    }
}
