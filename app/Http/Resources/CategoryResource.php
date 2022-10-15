<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_en' => $this->name_en,
            'slug_test' => $this->slug,
            'table' => $this->table,
            'sort' => $this->sort,
            'count' => $this->count,
            'parent_category_id' => $this->parent_category_id,
            'depth' => $this->depth,
            'extend' => $this->extend,
            'channel_id' => $this->channel_id,
            'is_show' => $this->is_show,
        ];
    }
}
