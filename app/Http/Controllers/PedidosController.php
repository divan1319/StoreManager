<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Order;
use App\Models\Provider;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Order $order){
        $providers = Provider::all();

        $orders = $order->with('provider')->where('estado',1)->latest()->get();

        return view('dashboard.pedidos',[
            'providers' => $providers,
            'orders'=>$orders
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'proveedor'=>'required',
            'fecha_entrega'=>'required'
        ]);

        Order::create([
            'provider_id'=>$request->proveedor,
            'fecha_entrega'=>$request->fecha_entrega
        ]);
        return back()->with('mensaje','El pedido se ha agregado correctamente, ingresa el detalle del pedido');
    }

    public function details($pedido,$ID){
        
        return view('dashboard.order_detail',[
            'pedido'=>$pedido,
            'ID'=>$ID,

        ]);
    }


}
