<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Supplier extends JsonResource
{

    public function toArray($request)
    {
        return [
            'name' => (string) $this->name
        ];
    }
}
