<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id',
        'order_date',
        'total_price',
        'status'
    ];

    public $timestamps = true;

    // USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
