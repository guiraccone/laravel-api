<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * Sempre utilize rsources para padronização de retorno de dados de uma api
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return ['identify' => $this->id,
        'name' => strtoupper($this->name),
        'email' => $this->email,
        'password' => $this->password,
        'created' => Carbon::make($this->created_at)->format('Y-m-d'),];
    }
}
