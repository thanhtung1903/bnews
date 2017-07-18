<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cat;

class PublicController extends Controller
{
   protected $arCats;

    public function __construct(){
        $this->arCats = Cat::all();
    }
}
