<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function usuariosRegistrados()
    {
    
        $usuariosPorMes = User::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as mes, COUNT(*) as cantidad')
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        return view('grafico', compact('usuariosPorMes'));
    }
}
