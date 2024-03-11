<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValoracionController extends Controller
{
    public function votar(Request $request, $id)
    {

        // Validar la votación (por ejemplo, asegurarse de que esté en un rango válido)
        $request->validate([
            'voto' => 'required|integer|min:1|max:5',
        ]);

        DB::table('cuadros')
            ->where('id', $id)
            ->update([
                'valoracion' => DB::raw($request->input('voto')),
                'votos' => DB::raw('votos + 1'),
            ]);
        
        $cuadroActualizado = DB::table('cuadros')->find($id);

        $mediaVotos = $cuadroActualizado->votos > 0 ? $cuadroActualizado->valoracion / $cuadroActualizado->votos : 0;

        return response()->json([
            'success' => true,
            'mediaVotos' => $mediaVotos, // Redondear a dos decimales
            'totalVotos' => $cuadroActualizado->votos,
        ]);
    }
}
