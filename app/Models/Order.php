<?php

namespace App\Models;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'table_no',
        'order_date', 
        'order_time',
        'status',
        'total',
        'waitress_id',
        'cashier_id'
    ];

    public function sumOderPrice(){
       $orderDetail = OrderDetail::where('order_id',$this->id)->pluck('price');
       $sum = collect($orderDetail)->sum();
       return $sum;
    }

}
