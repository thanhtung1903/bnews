<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirect;

class IndexController extends Controller
{
    public function index(){
        return view('admin.index.index');
    }
}
