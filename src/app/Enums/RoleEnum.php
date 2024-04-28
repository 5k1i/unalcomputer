<?php

namespace App\Enums;

enum RoleEnum
{
    const ADMIN = 1;
    const DEALER = 2;

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
    {
        return match ($this) {
            static::ADMIN => 'Admin',
            static::DEALER => 'Dealer',
            default => throw new \Exception('Unexpected match value'),
        };
    }
}
