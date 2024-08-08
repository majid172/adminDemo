<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model
{

    use HasFactory;
    protected $casts = [
        'address' => 'object'
    ];


    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function paymentMethod()
    {
        return $this->belongsTo(Gateway::class,'payment_code','code');
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('F d, Y');
    }
}
