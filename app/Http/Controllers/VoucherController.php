<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    public function add($request){
        try {
            $voucher = new Voucher();
            $voucher->name = $request->name;
            $voucher->code = $request->code;
            $voucher->type = $request->type;
            $voucher->value = $request->value;
            $voucher->quantity = $request->quantity;
            $voucher->start_date = $request->start_date;
            $voucher->end_date = $request->end_date;
            $voucher->creator = $request->user;
            $voucher->updater = $request->user;
            $voucher->save();
            return "Thêm thành công";
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function update($request){
        try {
            Voucher::whereRaw("id = $request->id")->update([
                "name" => $request->name,
                "code" => $request->code,
                "type" => $request->type,
                "value" => $request->value,
                "quantity" => $request->quantity,
                "start_date" => $request->start_date,
                "end_date" => $request->end_date,
                "updater" => $request->user
            ]);
            return "Cập nhật thành công";
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function gets($quantity, $keyword){
        try {
            if($keyword == "")
                $vouchers = Voucher::orderBy('id', 'desc')->paginate($quantity);
            else
                $vouchers = Voucher::where('id', $keyword)->orderBy('id', 'desc')->paginate($quantity);
            return $vouchers;
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function get($id){
        try {
            $voucher = Voucher::where("id", $id)->get();
            return $voucher;
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
}
