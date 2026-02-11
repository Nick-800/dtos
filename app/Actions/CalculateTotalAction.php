<?php

namespace App\Actions;

use App\DTOs\CheckoutData;

class CalculateTotalAction
{
    public function __invoke(CheckoutData $data): object
    {
        $subtotal = $data->nights * $data->ratePerNight;
        $tax = round($subtotal * $data->taxRate, 2);
        $total = round($subtotal + $tax, 2);

        return (object) [
            'subtotal' => round($subtotal, 2),
            'tax' => $tax,
            'total' => $total,
        ];
    }
}

