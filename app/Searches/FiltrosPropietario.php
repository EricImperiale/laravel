<?php

namespace App\Searches;

class FiltrosPropietario
{
    public function __construct(
        private ?string $nombreCompleto = null
    )
    {}

    public function getNombreCompleto(): string|null
    {
        return $this->nombreCompleto;
    }
}
