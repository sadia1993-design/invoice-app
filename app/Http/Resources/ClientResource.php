<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray($request)
    {
        $status_text = '';
        if ($this->status == 'active') {
            $status_text = '<label class="badge  bg-success text-white"> Active </label>';
        } else {
            $status_text = '<label class="badge  bg-secondary text-dark"> Inactive </label>';
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'country' => $this->country,
            'picture' => asset($this->picture),
            'status' => $this->status,
            'status_text' => $status_text,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}
