<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ActivoController extends Controller
{
    //
    public function index(){
        $datos=DB::select("select p.id, a.nombre, a.cantidad_inicial- p.stock, p.stock, a.descripcion
        from public.activo a
        inner join (select a.id, sum(b.cantidad) as stock
        from public.activo a
        inner join public.baja b on a.id = b.activo_id
        group by a.id)as p
        on a.id = p.id
        order by 1");
       // $datos=DB::select ("select * from activo");

        return view("welcome")->with("datos",$datos);
    }

    public function create(Request $request){
        try {
            $sql=DB::insert(" INSERT INTO public.activo(
                nombre, codigo, descripcion, cantidad_inicial)
                VALUES (?, ?, ?, ?)",[
                    $request->txtnombre,
                    $request->txtnombre,
                    $request->txtdescripcion,
                    $request->txtcantidad,
                ]);
        } catch (\Throwable $th) {
            $sql =0;
        }
            if ($sql == true){
                return back()->with("correcto","Activo registrado correctamente");
            }else{
                return back()->with("incorrecto","Error al registrar");
            }

        return $request->txtdescripcion;

    }

    public function update(Request $request){
        try {
            $sql=DB::update("update activo set nombre=?, descripcion=?",[
                $request->txtnombre,
                $request->txtdescripcion,
            ]);
        } catch (\Throwable $th) {
            $sql=0;
        }
        if ($sql == true){
            return back()->with("correcto","Activo actualizado correctamente");
        }else{
            return back()->with("incorrecto","Error al actualizar Activo");
        }
    }

    public function delete($id){
        try {
            $sql=DB::delete(" delete from activo where id = $id");
        } catch (\Throwable $th) {
            $sql =0;
        }
            if ($sql == true){
                return back()->with("correcto","Activo eliminado correctamente");
            }else{
                return back()->with("incorrecto","Error al eliminar");
            }

        return $request->txtdescripcion;

    }
}
