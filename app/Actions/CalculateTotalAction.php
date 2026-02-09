<?php

namespace App\Actions;

use App\DTOs\CheckoutData;

class CalculateTotalAction
{
    /**
     * @return array{subtotal: float, tax: float, total: float}
     */
    public function __invoke(CheckoutData $data): array
    {
        $subtotal = $data->nights * $data->ratePerNight;
        $tax = round($subtotal * $data->taxRate, 2);
        $total = round($subtotal + $tax, 2);

        return [
            'subtotal' => round($subtotal, 2),
            'tax' => $tax,
            'total' => $total,
        ];
    }
}
