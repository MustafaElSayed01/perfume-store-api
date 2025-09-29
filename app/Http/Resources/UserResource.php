<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->id,
            'user_type_id' => $this->user_type_id,
            'user_first_name' => $this->first_name,
            'user_last_name' => $this->last_name,
            'user_email' => $this->email,
            'user_mobile' => $this->phone,
            'joined' => $this->created_at->diffForHumans(),
        ];
    }
}
