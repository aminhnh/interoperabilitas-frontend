<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LembagaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'jenis' => $this->jenis,
            'alamat' => $this->alamat,
            'no_telepon' => $this->no_telepon,
            'kode_pos' => $this->kode_pos,
            'role' => new RoleResource($this->whenLoaded('role')),
            'kelurahan' => new KelurahanResource($this->whenLoaded('kelurahan')),
        ];
    }
}
