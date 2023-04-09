<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable=[
        'order_id',
        'producto',
        'precio',
        'cantidad'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
