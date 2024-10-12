<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Property;

class Tours extends Model
{

    protected $guarded = [];
    protected $table = "tours";
    protected $primaryKey = "trid";

    public function client()
    {
        return $this->belongsTo(User::class, 'uid', 'uid');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'uid');
    }

    public function tourProperty()
    {
        return $this->belongsTo(Properties::class, 'pid', 'pid');
    }
}
