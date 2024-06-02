<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function loginCheckManage(Request $request)
    {
        $data = [
            'phonenumber' => $request->phonenumber,
            'password' => $request->password,
        ];
        if (Auth::attempt($data) && Auth::user()->type == 0) {
            $_SESSION["id"] = Auth::user()->id;
            return Redirect::to('/manage/listorder/2?page=1');
        } else {
            return Redirect::to('/manage');
        }
    }

    public function loginCheck(Request $request)
    {
        $data = [
            'phonenumber' => $request->phonenumber,
            'password' => $request->password,
        ];
        if (Auth::attempt($data) && Auth::user()->type == 1) {
            $_SESSION["id"] = Auth::user()->id;
            return Redirect::to('/');
        } else {
            return Redirect::to('/dang-nhap');
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/manage');
    }

    public function logoutCustomer()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function updateQuantityRow($request)
    {
        User::where("id", $request->id)->update(["tablerow" => $request->tablerow]);
    }
}
