<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function add($data){
        $price = new Price();
        $price->id_product = $data["id_product"];
        $price->price = $data["price"];
        $price->type_price = $data["type_price"];
        $price->status = 1;
        $price->creator = $data["creator"];
        if($data["type_price"] == 0){
            $price->created_at = $data["created_at"];
            $price->updated_at = $data["updated_at"];
        }
        $price->save();
    }

    public function get($id_product){
        return Price::whereRaw("id_product = $id_product AND status = 1")->get();
    }

    public function updateStatusByType($id_product, $type){
        return Price::whereRaw("id_product = $id_product AND type_price = $type AND status = 1")->update(['status'=> 0]);
    }
}
