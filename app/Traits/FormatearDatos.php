<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait FormatearDatos
{
    public function capitalizarString(string $value): string
    {
        return ucwords(strtolower($value));
    }

    public function formatearPrecios(string $alquiler, string|null $expensas): string
    {
        if ($expensas) {
            return ' $' . $alquiler . ' + ' . ' $' . $expensas . ' expensas';
        }

        return ' $' . $alquiler;
    }

    public function formatearPrecioDeAlquiler(string $alquiler, string $expensas, string $tipoDeMoneda): string
    {
        if ($expensas) {
            return $tipoDeMoneda . ' ' . $alquiler . ' + ' . ' $' . $expensas . ' expensas';
        }

        return $tipoDeMoneda . ' ' . $alquiler;
    }

    public function formatearFechas(string $fecha): ?string
    {
        return Carbon::parse($fecha)->format('d/m/Y');
    }

    public function calcularDistanciaEntreFechas(string $fecha_comienzo, string $fecha_final): string
    {
        $fechaComienzo = Carbon::parse($fecha_comienzo);
        $fechaFinal = Carbon::parse($fecha_final);

        $diferencia = $fechaComienzo->diff($fechaFinal);

        $resultado = '';

        if ($diferencia->y > 0) {
            $resultado .= $diferencia->y . ' año' . ($diferencia->y > 1 ? 's' : '') . ' ';
        }

        if ($diferencia->m > 0) {
            $resultado .= $diferencia->m . ' mes' . ($diferencia->m > 1 ? 'es' : '') . ' ';
        }

        if ($diferencia->d > 0) {
            $resultado .= $diferencia->d . ' día' . ($diferencia->d > 1 ? 's' : '');
        }

        if ($resultado === '') {
            $resultado = '0 días';
        }

        return $diferencia;
    }
}
