<?php

namespace App\Traits;

trait FormatearDatos
{
    public function capitalizarString(string $value): string
    {
        return ucwords(strtolower($value));
    }
}
