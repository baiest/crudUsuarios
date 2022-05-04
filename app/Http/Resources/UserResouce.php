<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserResouce extends JsonResource
{
  /**
   * Transform the resource collection into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'username' => $this->username,
      'name' => $this->name,
      'last_name' => $this->last_name,
      'id_type' => $this->id_type,
      'birthdate' => $this->birthdate,
      'email' => $this->email,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
    ];
  }
}
