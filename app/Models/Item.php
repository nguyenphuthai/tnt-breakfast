<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = ["id"];
    use HasFactory;

    public function Product(){
        return $this->belongsTo(Product::class,"product_id","id");
    }
}
