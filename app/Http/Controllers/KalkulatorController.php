<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function index()
    {
        return view('kalkulator');
    }

    public function operation(Request $request)
    {
        $number1 = $request->input('number1');
        $number2 = $request->input('number2');
        $operation = $request->input('operation');
        $result = null;

        switch ($operation) {
            case 'addition':
                $result = $number1 + $number2;
                break;
            case 'subtraction': // Matched your HTML value spelling
                $result = $number1 - $number2;
                break;
            case 'multiplication':
                $result = $number1 * $number2;
                break;
            case 'division':
                if ($number2 == 0) {
                    $error = "Cannot divide by zero!";
                } else {
                    $result = $number1 / $number2;
                }
                break;
            default:
                $error = "Invalid operation.";
                break;
        }

        return view('kalkulator', [
            'result' => $result,
            'number1' => $number1,
            'number2' => $number2
        ]);
    }
}
