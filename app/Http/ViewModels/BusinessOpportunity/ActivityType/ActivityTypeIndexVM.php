<?php

namespace App\Http\ViewModels\BusinessOpportunity\ActivityType;

use App\Domain\BusinessOpportunity\ActivityType\Models\ActivityType;

class ActivityTypeIndexVM
{
    public function ActivityTypes(){
        return ActivityType::all();
    }

    public function toArray()
    {
        return [
            'ActivityTypes' => $this->ActivityTypes(),
        ];
    }
}
