<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'num1' => 'required|numeric',
            'num2' => 'required|numeric',
            'operator' => 'required|in:add,subtract,multiply,divide',
        ]);

        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $operator = $request->input('operator');
        $result = $this->performCalculation($num1, $num2, $operator);

        return view('calculator', compact('result'));
    }

    private function performCalculation($num1, $num2, $operator)
    {
        switch ($operator) {
            case 'add':
                return $num1 + $num2;
            case 'subtract':
                return $num1 - $num2;
            case 'multiply':
                return $num1 * $num2;
            case 'divide':
                if ($num2 != 0) {
                    return $num1 / $num2;
                } else {
                    return 'Error: Division by zero';
                }
            default:
                return 'Error: Invalid operator';
        }
    }
}
