<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id_news';
    public $timestamps = false;
    public static function getItems(){
    	return DB::table('news as n')->join('category as c', 'n.id_cat', '=', 'c.id_cat')->orderBy('n.id_news', 'DESC')->select('n.*', 'c.name as cname')->paginate(10);
    }
}
