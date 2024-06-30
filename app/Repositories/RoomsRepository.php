<?php

namespace App\Repositories;

use App\Models\Room;
use App\Interfaces\RoomsRepositoryInterface;

class RoomsRepository implements RoomsRepositoryInterface
{
    public function index()
    {
        return Room::all();
    }

    public function getById($id)
    {
        return Room::findOrFail($id);
    }

    public function getByPropertyId($propertyId)
    {
        return Room::where('property_id', $propertyId)->get();
    }
}
