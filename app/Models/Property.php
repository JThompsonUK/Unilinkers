<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'address', 'no_of_rooms'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
