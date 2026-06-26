<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{

    public function ventas()
    {
        // Obtener resumen por evento
        $resumenEventos = DetalleCompra::select('evento_id')
            ->with('evento')
            ->selectRaw('SUM(cantidad) as total_entradas')
            ->selectRaw('SUM(subtotal) as total_recaudado')
            ->groupBy('evento_id')
            ->get();

        // Totales generales
        $totalEntradas = DetalleCompra::sum('cantidad');
        $totalRecaudado = DetalleCompra::sum('subtotal');
        $totalCompras = Compra::count();
        $totalComisiones = $totalCompras * 2000;
        $gananciaNeta = $totalRecaudado - $totalComisiones;

        // ✅ Calcular comisión por evento: 2000 por cada compra que tenga ese evento
        foreach ($resumenEventos as $item) {
            // Contar cuántas compras tienen este evento (sin duplicar)
            $cantidadCompras = DetalleCompra::where('evento_id', $item->evento_id)
                ->distinct('compra_id')
                ->count('compra_id');
            
            // Comisión por evento = cantidad de compras * 2000
            $item->comision = $cantidadCompras * 2000;
            $item->ganancia_neta = $item->total_recaudado - $item->comision;
        }

        return view('backend.admin.reportes.ventas', compact(
            'resumenEventos',
            'totalEntradas',
            'totalRecaudado',
            'totalComisiones',
            'gananciaNeta',
            'totalCompras'
        ));
    }
}