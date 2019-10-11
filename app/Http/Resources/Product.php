<?php

namespace App\Http\Resources;

use App\Http\Resources\Supplier as SupplierRessource;
use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'name' => (string) $this->name,
            'description' => (string) $this->description,
            'stock' => (int) $this->qty,
            'supplier' => SupplierRessource::make($this->supplier)
        ];
    }
}
