<?php

namespace App\Models;

use App\Http\Controllers\ProductController;
use Illuminate\Database\Eloquent\Model;

class Protype extends Model
{
    protected $table = 'protypes';
    protected $primaryKey = 'type_id';

    protected $fillable = ['type_name'];

    public function products()
    {
        return $this->hasMany(ProductController::class, 'type_id', 'type_id');
    }
}
