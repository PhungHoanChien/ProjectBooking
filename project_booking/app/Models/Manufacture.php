<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $table = 'manufactures';
    protected $primaryKey = 'manu_id';

    protected $fillable = [
        'manu_name'
    ];

    public $timestamps = true;
}
