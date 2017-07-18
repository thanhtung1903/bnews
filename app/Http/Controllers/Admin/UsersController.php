<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirect;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

    public function index()
    {
        $arUsers = User::all();
        return view('admin.users.index',['arUsers' => $arUsers]);
    }
    public function getAdd(){
        return view('admin.users.add');
    }
    public function postAdd(Request $request){
        $arUser = array(
            'username' => trim($request->username),
            'password' => bcrypt(trim($request->password)),
            'fullname' => $request->fullname
        );
        if (User::insert($arUser)){
            $request->session()->flash('msg', 'Thêm thành công');
            return redirect()->route('admin.users.index');
        }
    }
    public function getEdit($id){
        $arUser = User::find($id);
        return view('admin.users.edit',['arUser' => $arUser]);
    }
    public function postEdit($id, Request $request){
       $arUser = User::find($id);
       $arUser->username = trim($request->username);
       //if(trim($request->password) != ''){
            $arUser->password = bcrypt(trim($request->password));
      // }
       $arUser->fullname = $request->fullname;
        if ($arUser->update()){
            $request->session()->flash('msg', 'Sửa thành công');
            return redirect()->route('admin.users.index');
        }
    }
    function del($id, Request $request){
        $arUser = User::find($id);
        if($arUser['username'] == 'admin'){
            $request->session()->flash('msg', 'Bạn không được xóa admin');
            return redirect()->route('admin.users.index');
        }
        $arUser->delete();
        $request->session()->flash('msg', 'Xóa thành công');
        return redirect()->route('admin.users.index');
    }
    
}
