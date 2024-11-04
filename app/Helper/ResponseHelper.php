<?php
namespace App\Helper;


class ResponseHelper
{
    public static function response($msg, $data, $code)
    {
        return response()->json(['msg' => $msg, 'data' => $data],$code);
    }
}