<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }

    public function addNew()
    {
        return view('admin.addnew.index');
    }
}
