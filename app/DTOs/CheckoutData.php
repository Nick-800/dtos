<?php

namespace App\DTOs;

class CheckoutData
{
    public function __construct(
        public string $guestName,
        public string $roomType,
        public int $nights,
        public float $ratePerNight,
        public float $taxRate,
        public ?string $notes = null
    ) {
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['guest_name'],
            $data['room_type'],
            (int) $data['nights'],
            (float) $data['rate_per_night'],
            (float) $data['tax_rate'],
            $data['notes'] ?? null
        );
    }
}
