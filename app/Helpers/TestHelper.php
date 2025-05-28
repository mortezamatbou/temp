<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class TestHelper {
    public static function say_hello_json(): JsonResponse {
        return response()->json(['first_name' =>'Morteza', 'last_name' => 'Matbou']);
    }
}

function say_hello_json(array $data) {
    return response()->json($data);
}
