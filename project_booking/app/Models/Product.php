<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        protected $table = 'products';

    protected $fillable = [
        'name',
        'manu_id',
        'type_id',
        'price',
        'pro_image',
        'description',
        'feature'
    ];

    public $timestamps = true;

    // 🔗 Quan hệ
    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class, 'manu_id', 'manu_id');
    }

    public function protype()
    {
        return $this->belongsTo(Protype::class, 'type_id', 'type_id');
    }
}
