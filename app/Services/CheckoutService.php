<?php

namespace App\Services;

use App\Actions\CalculateTotalAction;
use App\DTOs\CheckoutData;

class CheckoutService
{
    public function __construct(
        private readonly CalculateTotalAction $calculateTotal
    ) {
    }

    public function checkout(CheckoutData $data): object
    {
        $pricing = ($this->calculateTotal)($data);

        return (object) [
            'guest' => $data->guestName,
            'room_type' => $data->roomType,
            'nights' => $data->nights,
            'rate_per_night' => $data->ratePerNight,
            'pricing' => $pricing,
            'confirmation_code' => $this->generateConfirmationCode(),
            'notes' => $data->notes,
        ];
    }

    private function generateConfirmationCode(): string
    {
        return strtoupper(bin2hex(random_bytes(3)));
    }
}
