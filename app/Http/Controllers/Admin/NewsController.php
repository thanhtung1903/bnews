<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirect;
use Illuminate\Http\Request;
use App\News;
use App\Cat;

class NewsController extends Controller
{
    public function index(){
    	//$arNews = DB::table('news')->join('category', 'news.id_cat', '=', 'category.id_cat')->select('news.id_news')->get();
    	$arNews = News::getItems();
    	//dd($arNews);
        return view('admin.news.index',['arNews'=> $arNews]);
    }
    public function getAdd(){
    	$arCats = Cat::all();
        return view('admin.news.add',['arCats' => $arCats]);
    }
    public function postAdd(Request $request){
    	$picture = '';
    	if ($request->file('hinhanh') != NULL){
    		$path = $request->file('hinhanh')->store('files');
    		$arFile = explode('/', $path);
    		$picture = end($arFile);
    	}
    	$arNews = array(
    		'name' => $request->tentin,
			'preview_text' => $request->mota,
			'detail_text' => $request->chitiet,
			'picture' => $picture,
			'id_cat' => $request->danhmuc
    	);
    	if (News::insert($arNews)){
    		$request->session()->flash('msg', 'Thêm thành công');
    		return redirect()->route('admin.news.index');
    	}
    }
    public function del($id_news, Request $request){
        $arNew = News::find($id_news);
        $picture = $arNew['picture'];
        if ($picture != ""){
           Storage::delete("files/".$picture);
        }
        $arNew->delete();
        $request->session()->flash('msg', 'Xóa thành công');
        return redirect()->route('admin.news.index');
    }
    public function getEdit($id, Request $request){
        $arNew = News::find($id);
        $arCats = Cat::all();
        return view('admin.news.edit',['arNew' => $arNew, 'arCats' => $arCats]);
    }
    public function postEdit($id, Request $request){
        $arNew = News::find($id);
        $picture = $arNew['picture'];
        if ($request->file('hinhanh') != NULL){
            Storage::delete("files/".$picture);
            $path = $request->file('hinhanh')->store('files');
            $arFile = explode('/', $path);
            $picture_new = end($arFile);
            $arNew->picture = $picture_new;
        }
        $arNew->name = $request->tentin;
        $arNew->preview_text = $request->mota;
        $arNew->detail_text = $request->chitiet;
        $arNew->id_cat = $request->danhmuc;
       
        if ($arNew->update()){
            $request->session()->flash('msg', 'Sửa thành công');
            return redirect()->route('admin.news.index');
        }
    }
}
