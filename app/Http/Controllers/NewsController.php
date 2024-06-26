<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function add(Request $request)
    {
        $news = new News();
        $news->title = $request->title;
        $news->slug = $request->slug;
        $news->image = $request->file('image')->store('images');
        $news->content = $request->content;
        $news->banner = $request->banner;
        $news->creator = $request->user;
        $news->updater = $request->user;
        $news->save();
        return "Thêm thành công";
    }

    public function gets($quantity, $keyword){
        try {
            if($keyword == "")
                $news = News::orderBy('id', 'desc')->paginate($quantity);
            else
                $news = News::where("id", $keyword)->orderBy('id', 'desc')->paginate($quantity);
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

    public function update($request){
        try {
            $news = News::where("id", $request->id)->get();
            $condition = array();
            if($request->title != $news[0]->title){
                $condition["title"] = $request->title;
                $condition["slug"] = $request->slug;
            }
            if($request->content != $news[0]->content)
                $condition["content"] = $request->content;
            if(isset($request->image) == true){
                Storage::delete($news[0]->image);
                $condition["image"] = $request->file('image')->store('images');
            }
            $condition["banner"] = $request->banner;
            $condition["updater"] = $request->user;
            News::whereRaw("id = $request->id")->update($condition);
            return "Cập nhật thành công";
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function delete($request){
        try {
            $news = News::where("id", $request->id)->get();
            Storage::delete($news[0]->image);
            News::where("id", $request->id)->delete();
            return "Xoá thành công";
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
