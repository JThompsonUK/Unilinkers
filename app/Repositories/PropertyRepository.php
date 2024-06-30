<?php

namespace App\Repositories;

use App\Models\Property;
use App\Interfaces\PropertyRepositoryInterface;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function index()
    {
        return Property::all();
    }

    public function getById($id)
    {
        return Property::with('rooms')->findOrFail($id);
    }

    public function store(array $data)
    {
        return Property::create($data);
    }

    public function update(array $data, $id)
    {
        return Property::whereId($id)->update($data);
    }

    public function delete($id)
    {
        Property::destroy($id);
    }
}
