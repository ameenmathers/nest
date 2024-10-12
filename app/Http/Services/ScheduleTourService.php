<?php

namespace App\Http\Services;

use App\Models\Tours;

class ScheduleTourService
{
    public function createTour($data)
    {
        $tour = new Tours();
        $tour->uid = auth()->user()->uid;
        $tour->pid = $data['pid'];
        $tour->agent_id = $data['agent_id'];
        $tour->date = $data['date'];
        $tour->time = $data['time'];

        $tour->save();

        return $tour;
    }
}
