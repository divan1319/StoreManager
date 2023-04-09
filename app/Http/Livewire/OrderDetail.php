<?php

namespace App\Http\Livewire;

use App\Models\Detail;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class OrderDetail extends Component
{
    public $pedido;
    public $ID;
    public $producto;
    public $precio;
    public $cantidad;
    

    protected $rules = [
        'producto' => 'required',
        'precio' => ['required', 'numeric', 'min:0.1'],
        'cantidad' => ['required', 'integer', 'min:1']
    ];

    public function addDetails()
    {

        $datos = $this->validate();

        Detail::create([
            'order_id' => $this->ID,
            'producto' => $datos['producto'],
            'precio' => $datos['precio'],
            'cantidad' => $datos['cantidad']
        ]);
        session()->flash('mensaje', 'Se agregon productos al pedidos');
        
    }

    public function render()
    {
        //dd($this->ID);
        $details = Detail::all()->where('order_id', $this->ID);
        $orders = Order::all()->where('id',$this->ID);
        return view('livewire.order-detail', [
            'details' => $details,
            'orders'=>$orders
        ]);
    }
}
