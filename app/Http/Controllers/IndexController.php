<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cat;

class IndexController extends PublicController
{
    public function index(){
    	$title = "VinaENTER - Trang Chủ";
        return view('index.index', ['arCats' => $this->arCats, 'title' => $title]);
    }
}
