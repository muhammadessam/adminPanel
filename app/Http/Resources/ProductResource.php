<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'name'          => $this->name,
            'bar_code'      => $this->bar_code,
            'selling_price' => $this->selling_price,
            'buying_price'  => $this->buying_price,
            'lower_price'   => $this->lower_price,
            'quantity_type' => $this->quantity_type,
            'quantity'      => $this->quantity,
            'group_id'      => $this->group_id,
            'sub_group_id'  => $this->sub_group_id,
            'expired_at'    => $this->expired_at,
        ];
    }
}
