<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/calculator.css') }}">
    <title>calculatrice basique</title>
</head>
<body>
    <div class="calculator">
        <h1>Calculatrice basique</h1>

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('calculator.calculate') }}">
            @csrf

            <div class="form-row">
                <input type="number" step='0.01' name="first_number" value="{{ old('first_number', $inputs['first_number'] ?? '') }}" placeholder="nombre 1">

                <select name="operation">
                    <option value="add" {{ (old('operation', $inputs['operation'] ?? '') === 'add') ? 'selected' : '' }}>+</option>
                    <option value="subtract" {{ (old('operation', $inputs['operation'] ?? '') === 'subtract') ? 'selected' : '' }}>−</option>
                    <option value="multiply" {{ (old('operation', $inputs['operation'] ?? '') === 'multiply') ? 'selected' : '' }}>×</option>
                    <option value="divide" {{ (old('operation', $inputs['operation'] ?? '') === 'divide') ? 'selected' : '' }}>÷</option>
                </select>

                <input type="number" step='0.01' name="second_number" value="{{ old('second_number', $inputs['second_number'] ?? '') }}" placeholder="nombre 2">
            </div>

            <button type="submit">Calculer</button>
        </form>

        @isset($result)
            <div class="result">{{ $first_number }} {{ getSymbol($operation) }} {{ $second_number }} = {{ $result }}</div>
        @endisset
    </div>
</body>
</html>