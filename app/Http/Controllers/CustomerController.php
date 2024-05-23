<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function add($name, $phonenumber, $email){
        try {
            $customer = new Customer();
            if(Customer::where("phonenumber", $phonenumber)->count() == 0){
                $customer->name = $name;
                $customer->phonenumber = $phonenumber;
                $customer->email = $email;
                $customer->type = 1;
                $customer->percent_promotion = 0;
                $customer->total_shopping = 0;
                $customer->save();
            }
            else{
                Customer::whereRaw("phonenumber = $phonenumber")->update(["name" => $name, "email" => $email]);
            }
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function gets($quantity){
        try {
            $customers = Customer::orderBy('id', 'desc')->paginate($quantity);
            return $customers;
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
}
