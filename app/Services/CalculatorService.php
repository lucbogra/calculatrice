<?php

namespace App\Services;

class CalculatorService
{
    public function calculate(float $first_number, float $second_number, string $operation) : float
    {
        // préféré match à switch car opération simple et valeur unique retournée
        return match ($operation) {
            'add'      => $this->add($first_number, $second_number),
            'subtract' => $this->subtract($first_number, $second_number),
            'multiply' => $this->multiply($first_number, $second_number),
            'divide'   => $this->divide($first_number, $second_number),
            default    => throw new \InvalidArgumentException('Opération invalide.'),
        };
    }

    private function add(float $first_number, float $second_number) : float
    {
        return $first_number + $second_number;
    }

    private function subtract(float $first_number, float $second_number) : float
    {
        return $first_number - $second_number;
    }

    private function multiply(float $first_number, float $second_number) : float
    {
        return $first_number * $second_number;
    }

    private function divide(float $first_number, float $second_number) : float
    {
        // vérification du diviseur avant de procéder à l'opération
        if ($second_number === 0.0) {
            throw new \InvalidArgumentException('Division par zero impossible.');
        }
        return $first_number / $second_number;
    }
}