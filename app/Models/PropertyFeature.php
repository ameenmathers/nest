<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    use HasFactory;

    protected $primaryKey = 'pfid';
    protected $table = 'property_features';
    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Properties::class);
    }
}
