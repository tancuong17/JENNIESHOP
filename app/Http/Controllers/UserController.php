<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function loginCheck(Request $request)
    {
        $data = [
            'phonenumber' => $request->phonenumber,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            $_SESSION["id"] = Auth::user()->id;
            return Redirect::to('/manage/listorder/2?page=1');
        } else {
            return Redirect::to('/manage');
        }
    }
}
