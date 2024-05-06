<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Controllers\OrderDetailController;

class OrderController extends Controller
{
    public function add($request){
        try {
            $order = new Order();
            $orderDetailController = new OrderDetailController();
            $order->customer = $request->customer;
            $order->phonenumber = $request->phonenumber;
            $order->email = $request->email;
            $order->province = $request->province;
            $order->district = $request->district;
            $order->ward = $request->ward;
            $order->address = $request->address;
            $order->status = $request->status;
            $order->payment = $request->payment;
            $cart = json_decode($request->cart);
            $order->save();
            for ($i=0; $i < count($cart); $i++) { 
                $orderDetailController->add($cart[$i], $order->id);
            }
            return "Thêm thành công";
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
    public function gets($quantity){
        try {
            $orders = Order::orderBy('id', 'desc')->paginate($quantity);
            return $orders;
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
    public function get($id){
        try {
            $order = Order::where("id", $id)->get();
            return $order;
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
}
