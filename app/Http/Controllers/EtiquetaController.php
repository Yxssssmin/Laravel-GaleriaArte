<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuadro;
use App\Services\ApiService;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{

    private $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function loginAndImport() {
        $token = $this->apiService->login();

        if($token) {
            // $this->apiService->importItems($token);
        }
    }

    public function obtenerDatosCuadro() {
        $datosCuadros = Cuadro::all();

        return $datosCuadros;
    }

    public function prepararDatosParaEnviar() {
        $datosBDD = Cuadro::all();


    }
}
