<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Activo extends Model
{
    use HasFactory;

    protected $fillable = [
            'nombre',
            'codigo',
            'descripcion',
            'cantidad_inicial',
    ];

    public function add_stock($request){
        $this->update([
            'cantidad_inicial'-> DB::raw("cantidad_inicial + $request->cantidad_inicial")
        ]);
    }
}
