<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuadro;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtiquetaController extends Controller
{

    private $apiService;

    public function __construct()
    {
        $this->apiService = new ApiService;
    }

    public function importItems() {
        $cuadro = Cuadro::all()->first();
        $itemList = [
            [
                "attrCategory" => "practicas",
                "attrName" => "yasmintate",
                "barCode" => $cuadro->id . "-CUAD",
                "itemTitle" => $cuadro->nombre,
            ]
        ];

        $response = $this->apiService->batchImportItem($itemList);

        return response()->json($response);

    }

    public function batchBind() {

        $tagItemList = [
            [
                'eslBarcode' => '',
                'itemBarcode' => '',
            ]
        ];

        $response = $this->apiService->batchBind($tagItemList);

        return response()->json($response);
    }

    // public function obtenerDatosCuadro() {
    //     $datosCuadros = Cuadro::all();

    //     return $datosCuadros;
    // }
}
