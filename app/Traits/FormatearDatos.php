<?php

namespace App\Traits;

trait FormatearDatos
{
    public function capitalizarString(string $value): string
    {
        return ucwords(strtolower($value));
    }

    public function formatearPrecios(string $alquiler, string|null $expensas): string
    {
        if ($expensas) {
            return' $' . $this->precio_del_alquiler . ' + ' . ' $' . $this->expensas;
        }

        return' $' . $this->precio_del_alquiler;
    }
}
