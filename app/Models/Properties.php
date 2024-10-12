<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = "pid";
    protected $table = "properties";

    public function agent()
    {
        return $this->belongsTo(Agent::class,'agent_id','agent_id');
    }

    public function propertyAgent()
    {
        return $this->belongsTo(User::class,'agent_id', 'uid');
    }

    public function features()
    {
        return $this->hasMany(PropertyFeature::class,'pid','pid');
    }

    public function amenities()
    {
        return $this->hasMany(PropertyAmenities::class,'pid','pid');
    }

    public function images()
    {
        return $this->hasMany(Images::class,'pid','pid');
    }

    public function propertyTours()
    {
        return $this->hasMany(Tours::class, 'pid','pid');
    }
}
