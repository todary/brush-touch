<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user_name' => $this->user->name,
            'user_email' => $this->user->email,
            'total_price' => round($this->total_price, 3),
            'order_status' => $this->order_status,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'), // Format as desired
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'services' => ServiceOrderResource::collection($this->order_services),
        ];
    }
}
