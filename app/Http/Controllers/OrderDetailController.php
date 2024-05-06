<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;

class OrderDetailController extends Controller
{
    public function add($element, $idOrder){
      $orderDetail = new OrderDetail();
      $orderDetail->id_order = $idOrder;
      $orderDetail->id_product = $element->idProduct;
      $orderDetail->name = $element->nameProduct;
      $orderDetail->color = $element->color;
      $orderDetail->size = $element->size;
      $orderDetail->price = $element->priceProduct;
      $orderDetail->quantity = $element->quantity;
      $orderDetail->save();
    }
    public function gets($idOrder){
      try {
          $detailOrder = OrderDetail::where('id_order', $idOrder)->get();
          return $detailOrder;
      } catch (\Throwable $th) {
          return json_encode($th);
      }
  }
}
