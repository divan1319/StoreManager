@extends('layouts.dash')

@section('content')

@livewire('order-detail', ['ID' => $ID,'pedido'=>$pedido])

@endsection

