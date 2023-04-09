<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Purchase;
use Livewire\Component;

class ComprasPedidos extends Component
{
    public $pedido_compra;

    protected $rules =[
        'pedido_compra'=>'required'
    ];

    public function AgregarCompraPedido(){
        $datos=$this->validate();

        Purchase::create([
            'order_id'=>$datos['pedido_compra']
        ]);
        return back()->with('mensaje','Se agrego la compra');
    }

    public function render()
    {
        $fecha_actual = date('Y-m-d');
        $pedidos = Order::with('provider')->where('fecha_entrega',$fecha_actual)->where('estado',1)->get();
        
        return view('livewire.compras-pedidos',[
            'pedidos'=>$pedidos
        ]);
    }
}
