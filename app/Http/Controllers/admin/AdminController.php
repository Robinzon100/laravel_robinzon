<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Input;
use App\Book;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('Isadmin');
    }
    public function getAdmin(Request $request)
    {
        return view('admin.Admin');
    }
}
