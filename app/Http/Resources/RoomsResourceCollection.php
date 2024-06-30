<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RoomsResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($room) {
            return [
                'id' => $room->id,
                'name' => $room->name,
                'size' => $room->size,
                'property_id' => $room->property_id,
            ];
        })->all();
    }
}
