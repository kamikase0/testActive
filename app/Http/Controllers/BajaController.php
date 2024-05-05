<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BajaController extends Controller
{
    public function create(Request $request){
        //dd($request);
        try {
            $sql=DB::insert(" INSERT INTO public.baja(
                cantidad, motivo, created_at, activo_id)
                VALUES (?, ?, ?, ?)",[
                    $request->txtcantidad,
                    $request->txtmotivo,
                    $request->txtcreated_at,
                    $request->txtid,
                ]);
        } catch (\Throwable $th) {
            $sql =0;
        }
            if ($sql == true){
                return back()->with("correcto","Baja registrado correctamente");
            }else{
                return back()->with("incorrecto","Error al registrar Baja");
            }

        return $request->txtdescripcion;

    }
}
