<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cat;
use App\News;
class NewsController extends PublicController
{
    public function news(){
    	$title = "VinaENTER - Tin Tức";
    	$arNews = News::orderBy('id_news', 'desc')->paginate(getEnv('ROW_COUNT'));

        return view('news.news', ['arCats' => $this->arCats, 'title' => $title,'arNews' => $arNews]);
    }
    public function cat($slug, $id){
    	$arCat = Cat::find($id);
    	$arNews = News::orderBy('id_news', 'desc')->where('id_cat', '=', $id)->paginate(getenv('ROW_COUNT'));
    	$title = $arCat['name'];
        return view('news.cat', ['arCats' => $this->arCats, 'arNews' => $arNews, 'title' => $title]);
    }
    public function detail($slug, $id){
    	$arNew = News::find($id);
    	$title = $arNew['name'];
    	$arNewsLQ = News::orderBy('id_news', 'desc')->where('id_news', '<', $id)->where('id_cat', $arNew['id_cat'])->limit(2)->get();
        return view('news.detail',['arCats' => $this->arCats,'arNew' => $arNew, 'arNewsLQ' => $arNewsLQ, 'title' => $title]);
    }
}
