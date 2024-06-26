<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class ZaloPayController extends Controller
{
    public function create(Request $request)
    {
        // PHP Version 7.3.3
        $config = [
            "appid" => 554,
            "key1" => "8NdU5pG5R2spGHGhyO99HN1OhD8IQJBn",
            "key2" => "uUfsWgfLkRLzq6W2uNXTCxrfxs51auny",
            "endpoint" => "https://sandbox.zalopay.com.vn/v001/tpe/createorder"
        ];

        $embeddata = [
            "bankgroup" => "CC",
            "redirecturl" => "http://localhost/shop/"
        ];
        $items = [
            [ "itemid" => "knb", "itemname" => "kim nguyen bao", "itemprice" => 198400, "itemquantity" => 1 ]
        ];
        $order = [
            "appid" => $config["appid"],
            "apptime" => round(microtime(true) * 1000), // miliseconds
            "apptransid" => date("ymd")."_".uniqid(), // mã giao dich có định dạng yyMMdd_xxxx
            "appuser" => "demo",
            "item" => json_encode($items, JSON_UNESCAPED_UNICODE),
            "embeddata" => json_encode($embeddata, JSON_UNESCAPED_UNICODE),
            "amount" => 50000,
            "description" => "ZaloPay Intergration Demo",
            "bankcode" => ""
        ];

        // appid|apptransid|appuser|amount|apptime|embeddata|item
        $data = $order["appid"]."|".$order["apptransid"]."|".$order["appuser"]."|".$order["amount"]
        ."|".$order["apptime"]."|".$order["embeddata"]."|".$order["item"];
        $order["mac"] = hash_hmac("sha256", $data, $config["key1"]);

        $context = stream_context_create([
            "http" => [
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => "POST",
                "content" => http_build_query($order)
            ]
        ]);

        $resp = file_get_contents($config["endpoint"], false, $context);
        $result = json_decode($resp, true);

        //foreach ($result as $key => $value) {
            //echo "$key: $value<br>";
        //}
        return Redirect::to($result['orderurl']);
    }
}