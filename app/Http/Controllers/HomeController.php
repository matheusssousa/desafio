<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ultimoRegistro = Registro::latest()->first();
        $totalRegistros = Registro::count();
        $totalRegistrosExcluidos = Registro::onlyTrashed()->count();

        $countFeminino = Registro::where('sexo', 'Feminino')->count();
        $countMasculino = Registro::where('sexo', 'Masculino')->count();
        
        return view('home', ['ultimoRegistro' => $ultimoRegistro, 'countFeminino' => $countFeminino, 'countMasculino' => $countMasculino, 'totalRegistros' => $totalRegistros, 'totalRegistrosExcluidos' => $totalRegistrosExcluidos]);
    }
}
