<?php

namespace App\Http\Livewire;

use App\Models\Purchase;
use Livewire\Component;

class ComprasExternas extends Component
{
    public $vendedor;
    public $total;

    protected $rules =[
        'vendedor'=>'required',
        'total'=>['required','numeric','min:1']
    ];

    public function AgregarCompraExterna(){
        $datos=$this->validate();

        Purchase::create([
            'total'=>$datos['total'],
            'vendedor'=>$datos['vendedor']
        ]);
        $this->vendedor='';
        $this->total='';
        session()->flash('mensaje', 'Se agrego la compra');
        
    }

    public function render()
    {
        return view('livewire.compras-externas');
    }
}
