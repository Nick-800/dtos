<?php

namespace App\Http\Controllers;

use App\DTOs\CheckoutData;
use App\Http\Requests\CheckoutRequest;
use App\Services\CheckoutService;

class CheckoutController extends Controller
{
    public function store(CheckoutRequest $request, CheckoutService $service)
    {
        $data = CheckoutData::fromArray($request->validated());
        $result = $service->checkout($data);

        return response()->json($result);
    }
}
