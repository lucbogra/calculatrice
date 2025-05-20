<?php

if (!function_exists('getSymbol')) {
    function getSymbol(string $operation): string
    {
        return match ($operation) {
            'add' => '+',
            'subtract' => '-',
            'multiply' => 'x',
            'divide' => '÷',
            default => '?',
        };
    }
}