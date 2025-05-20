<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculatorRequest;
use App\Services\CalculatorService;
use App\Services\interfaces\CalculatorInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CalculatorController extends Controller
{
    public function __construct(private CalculatorInterface $calculator)
    {

    }

    public function index()
    {
        return view('calculator');
    }

    /**
     * j'injecte directement le service dans la méthode car il n'est utilisé qu'une seule fois dans le controller
     */
    public function calculate(CalculatorRequest $request, CalculatorService $calculatorService) : View|RedirectResponse
    {
        $data = $request->validated();
        try {
            $result = $this->calculator->calculate(
                (float) data_get($data, 'first_number'),
                (float) data_get($data, 'second_number'),
                data_get($request, 'operation')
            );

            return view('calculator', [
                'result'    => $result,
                'first_number'   => data_get($data, 'first_number'),
                'second_number'   => data_get($data, 'second_number'),
                'operation' => data_get($request, 'operation'),
            ]);
        } catch (\Throwable $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
}
