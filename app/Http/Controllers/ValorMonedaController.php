<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ValorMonedaController extends Controller
{

    public function obtenerTipoDeCambio(Request $request, $id)
    {
        $response = Http::withHeaders([
            'apikey' => 'eSBO1alMhinPk6gAWxWA6JW6onNQOiJn',
        ])->timeout(60)->get("https://api.apilayer.com/exchangerates_data/latest?symbols=USD&base=EUR");

        $tipoDeCambio = $response->json('rates.USD');

        // Obtener el registro de precio_historico por ID
        $precioHistorico = DB::table('cuadros')->find($id);

        if ($precioHistorico) {

            $precioDolares = $precioHistorico->precio_euros * $tipoDeCambio;

            DB::table('cuadros')
                ->where('id', $id)
                ->update([
                    'precio_euros' => $precioDolares,
                ]);
    
            return response()->json([
                'tipoDeCambio' => $tipoDeCambio,
                'precioDolares' => $precioDolares,
            ]);
        } else {
            return response()->json(['error' => 'Registro no encontrado en la tabla cuadros'], 404);
        }
        
    }
}
