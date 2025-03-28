<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'address'       => $this->address,
            'phone_number'  => $this->phone,
            'email'         => $this->email,
            'linked_in'     => $this->linkedin,
        ];
    }
}
