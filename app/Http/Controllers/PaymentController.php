<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct(protected PaymentService $payment) {}

    public function __invoke(Request $request): JsonResponse
    {
        $result = $this->payment->execute();
        return response()->json($result);
    }
}
