<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuadrosController extends Controller
{

    public function bienvenida(){
        return view("welcome");
    }

    public function index() {
        $datos=DB::select(" select * from cuadros ");
        return view("cuadros")->with("datos", $datos);
    }

    public function mostrarFormulario() {
        return view("show");
    }

    public function detallesCuadro(){
        return view("details");
    }
    
    public function create(Request $request) {
        try {
            $sql = DB::insert("INSERT INTO cuadros(id, nombre, autor, precio_euros, ubicacion, descripcion) VALUES (?, ?, ?, ?, ?, ?)", [
                $request->txtcodigo,
                $request->txtnombre,
                $request->txtautor,
                $request->txtprecio,
                $request->txtubicacion,
                $request->txtdescripcion,
            ]);
    
            if ($sql) {
                return redirect()->route('arte.index')->with("correcto", "Cuadro registrado correctamente");
            } else {
                return back()->with("incorrecto", "Error al registrar");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al registrar");
        }

    }

    public function update(Request $request) {
        try {
            $sql=DB::update(" update cuadros set nombre=?,autor=?,precio_euros=?,ubicacion=?,descripcion=? where id=? ", [
                $request->txtnombre,
                $request->txtautor,
                $request->txtprecio,
                $request->txtubicacion,
                $request->txtdescripcion,
                $request->txtcodigo,
            ]);

            if($sql == 0) {
                $sql = 1;
            }

        } catch (\Throwable $th) {
            $sql = 0;
        }

        if($sql == true) {
            return back()->with("correcto","Cuadro modificado correctamente");
        } else {
            return back()->with("incorrecto","Error al modificar");
        }

    }

    public function delete($id) {
        try {
            $sql = DB::delete(" delete from cuadros where id=$id ");
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if($sql == true) {
            return back()->with("correcto","Cuadro eliminado correctamente");
        } else {
            return back()->with("incorrecto","Error al eliminar");
        }
    }




}
