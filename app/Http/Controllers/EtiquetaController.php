<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuadro;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class EtiquetaController extends Controller
{

    private $apiService;

    public function __construct()
    {
        $this->apiService = new ApiService;
    }

    // public function importItems() {
    //     $cuadro = Cuadro::all()->first();
    //     $itemList = [
    //         [
    //             "attrCategory" => "practicas",
    //             "attrName" => "yasmintate",
    //             "barCode" => $cuadro->id . "-CUAD",
    //             "itemTitle" => $cuadro->nombre,
    //         ]
    //     ];

    //     $response = $this->apiService->batchImportItem($itemList);

    //     return response()->json($response);

    // }

    // public function batchBind() {
    //     $cuadro = Cuadro::all()->first();
    //     $tagItemList = [
    //         [
    //             'eslBarcode' => '802175411',
    //             'itemBarcode' => $cuadro->id . "-CUAD",
    //         ]
    //     ];

    //     $response = $this->apiService->batchBind($tagItemList);

    //     return response()->json($response);
    // }

    public function login() {

        $data = [
            'account' => 'yasmintate',
            'password' => 'Practicas2024',
            'loginType' => 3
        ];

        $importResponse = $this->apiService->loginCloud($data);

        return response()->json([
            'importResponse' => $importResponse
        ]);

    }

    public function importAndBindItems(Request $request, $cuadro_id) {

        $cuadro = Cuadro::find($cuadro_id);
        // Obtener el valor del código de barras del cuerpo de la solicitud
        $barcode = $request->input('barcode');
        
        // importar el artículo
        $itemList = [
            "attrCategory" => "practicas",
            "attrName" => "yasmintate",
            "barCode" => $barcode,
            "itemTitle" => $cuadro->nombre,
            "price" => $cuadro->precio_euros,
            "qrCode" => URL::route('arte.detallesCuadro', ['id' => $cuadro_id]),
            "custFeature1" => $cuadro->autor,
            "custFeature2" => $cuadro->ubicacion,
            "unit" => $cuadro->votos,
        ];
        
        $importResponse = $this->apiService->batchImportItem($itemList);

        // Agregar lógica para vincular el artículo
        $tagItemList = 
            [
                'eslBarcode' => '802175411',
                'itemBarcode' => $barcode,
            ];
        $bindResponse = $this->apiService->batchBind($tagItemList);

    
        return response()->json([
            'importResponse' => $importResponse,
            'bindResponse' => $bindResponse
        ]);

    }
    
}
