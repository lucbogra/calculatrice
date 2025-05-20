<?php

namespace App\Services\interfaces;

Interface CalculatorInterface
{
    public function calculate(float $first_number, float $second_number, string $operation): float;
}