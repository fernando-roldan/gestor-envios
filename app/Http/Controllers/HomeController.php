<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        /* $sqlsrvs = DB::connection('sqlsrv')->table('GM_CartaInstruccion')->get(); //consultar una tabla en SQL Server
        $storeProcedure = DB::connection('sqlsrv')->select('EXEC sp_ObtenerEmbarqueDetalle ?', [12934]); // Ejecutar un Store Procedure de SQL Server

        dd($storeProcedure);

        foreach($sqlsrvs as $sqlsrv) {
            
            dd($sqlsrv->IDEmbarque);
        } */

        return view('home');
    }
}
