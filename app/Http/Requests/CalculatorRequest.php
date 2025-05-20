<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_number'  => ['required', 'numeric'],
            'second_number' => ['required', 'numeric'],
            'operation'     => ['required', 'in:add,subtract,multiply,divide']
        ];
    }

    public function attributes(): array
    {
        return [
            'first_number'   => 'nombre 1',
            'second_number'   => 'nombre 2',
            'operation' => 'opération',
        ];
    }

}
