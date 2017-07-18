<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\CatRequest;
use App\Cat;

class CatController extends Controller
{
    public function index(){
        $arCats = Cat::orderBy('id_cat', 'desc')->paginate(getEnv('ROW_COUNT'));
        return view('admin.cat.index',['arCats' => $arCats]);
    }
    public function getAdd(){
        return view('admin.cat.add');
    }
    public function postAdd(CatRequest $request){
        $arCat = array(
            'name' => $request->tendmt
        );
        if (Cat::insert($arCat)){
            $request->session()->flash('msg', 'Thêm thành công');
            return redirect()->route('admin.cat.index');
        }
    }
    public function getEdit($id){
        $arCat = Cat::find($id);
        return view('admin.cat.edit',['arCat' => $arCat]);
    }
    public function postEdit($id, CatRequest $request){
       $arCat = Cat::find($id);
       $arCat->name = $request->tendmt;
        if ($arCat->update()){
            $request->session()->flash('msg', 'Sửa thành công');
            return redirect()->route('admin.cat.index');
        }
    }
    function del($id, CatRequest $request){
        $arCat = Cat::find($id);
        $arCat->delete();
        $request->session()->flash('msg', 'Xóa thành công');
        return redirect()->route('admin.cat.index');
    }
}
