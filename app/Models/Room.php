<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'size', 'property_id'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
