<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ValorMonedaController extends Controller
{

    public function obtenerTipoDeCambio(Request $request, $idPrecio)
    {
        $response = Http::withHeaders([
            'apikey' => 'eSBO1alMhinPk6gAWxWA6JW6onNQOiJn',
        ])->timeout(60)->get("https://api.apilayer.com/exchangerates_data/latest?symbols=USD&base=EUR");

        $tipoDeCambio = $response->json('rates.USD');

        // Obtener el registro de precio_historico por ID
        $precioHistorico = DB::table('precio_historico')->find($idPrecio);

        if($precioHistorico) {

            $precioDolares = $precioHistorico->precio_euros * $tipoDeCambio;

            DB::table('precio_historico')
                ->where('id', $idPrecio)
                ->update([
                    'precio_euros' => $precioHistorico->precio_euros,
                    'precio_dolares' => $precioDolares,
                ]);
    
            return response()->json([
                'tipoDeCambio' => $tipoDeCambio,
                'precioDolares' => $precioDolares,
            ]);

        } else {
            // Manejar el caso en que no se encuentre el registro de precio_historico
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }
        
    }
}
