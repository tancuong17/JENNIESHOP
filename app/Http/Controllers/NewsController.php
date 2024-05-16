<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function add(Request $request)
    {
        $news = new News();
        $news->title = $request->title;
        $news->slug = $request->slug;
        $news->image = $request->file('image')->store('images');
        $news->content = $request->content;
        $news->save();
        return "Thêm thành công";
    }

    public function gets($quantity){
        try {
            $news = News::paginate($quantity);
            return $news;
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function get($id){
        try {
            $news = News::where("id", $id)->get();
            return $news;
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
}
