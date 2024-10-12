<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAmenities extends Model
{
    use HasFactory;

    protected $primaryKey = 'pamid';
    protected $table = 'property_amenities';

    protected $guarded = [];
}
