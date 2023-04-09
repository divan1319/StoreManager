<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Recarga;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RecargasController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        //Obteniendo datos de company y la fecha del model Recarga
        $companies = Company::all();
        $fechas = Recarga::with('company')->get();
        
        return view('dashboard.recargas',[
            'companies' =>$companies,
            'fechas'=>$fechas,    
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'company'=>'required',
            'total'=>'required|numeric'
        ]);

        Recarga::create([
            'company_id'=>$request->company,
            'total'=>$request->total
        ]);

        return back()->with('mensaje','Se ha agregado correctamente el pago.');
    }

}
