<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $discounted = $this->discount?->type == 'percent' ? $this->price - ($this->price * $this->discount->discount*0.01) : $this->price;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => [
                'full' => $this->price,
                'discounted' => number_format($discounted,2)
            ],
            'discount' => [
                'type' => $this->discount?->type,
                'amount' => $this->discount?->discount
            ],
            'images' => $this->images->map(function ($image) {
                return config('filesystems.disks.public.url').$image->path;
            })
        ];
    }
}
