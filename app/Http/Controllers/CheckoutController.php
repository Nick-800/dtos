<?php

namespace App\Http\Controllers;

use App\DTOs\CheckoutData;
use App\Services\CheckoutService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request, CheckoutService $service)
    {
        $validated = $request->validate([
            'guest_name' => ['required', 'string', 'max:100'],
            'room_type' => ['required', 'string', 'in:standard,deluxe,suite'],
            'nights' => ['required', 'integer', 'min:1', 'max:30'],
            'rate_per_night' => ['required', 'numeric', 'min:0'],
            'tax_rate' => ['required', 'numeric', 'min:0', 'max:1'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        $data = CheckoutData::fromArray($validated);
        $result = $service->checkout($data);

        return response()->json($result);
    }
}
