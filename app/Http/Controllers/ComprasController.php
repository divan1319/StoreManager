<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprasController extends Controller
{

       public function __construct()
       {
              $this->middleware('auth');
       }
       public function index(){
        return view('dashboard.compras');
       }

       public function externas(){
              return view('compras.externas');
       }
       public function pedidos(){
              return view('compras.pedidos');
       }
}
