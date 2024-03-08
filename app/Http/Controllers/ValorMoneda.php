<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ValorMoneda extends Controller
{

    public function obtenerTipoDeCambio()
    {
        $response = Http::withHeaders([
            'apikey' => 'eSBO1alMhinPk6gAWxWA6JW6onNQOiJn',
        ])->timeout(60)->get("https://api.apilayer.com/exchangerates_data/latest?symbols=USD&base=EUR");

        $tipoDeCambio = $response->json('rates.USD');

        return response()->json(['tipoDeCambio' => $tipoDeCambio]);
    }
}
