<?php

namespace App\Models;

use App\Models\Supplier; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    
    const FIELDS_FILLABLE = ['name', 'description', 'supplier_id', 'supplier_product_id', 'qty', 'last_refresh_at'];

    protected $with = ['supplier', 'orders'];
    protected $casts = ['last_refresh_at' => 'datetime'];
    protected $fillable = self::FIELDS_FILLABLE;

    public function orders(){
        return $this->hasMany(Cart::class, 'product_id');
    }

    public function supplier(){
        return $this->hasOne(Supplier::class, 'id');
    }

}
