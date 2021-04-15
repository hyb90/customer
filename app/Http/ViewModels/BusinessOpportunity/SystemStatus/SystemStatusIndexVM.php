<?php

namespace App\Http\ViewModels\BusinessOpportunity\SystemStatus;

use App\Domain\BusinessOpportunity\SystemStatus\Models\ActivityType;

class SystemStatusIndexVM
{
    public function systemStatus(){
        return ActivityType::all();
    }

    public function toArray()
    {
        return [
            'systemStatuses' => $this->systemStatus(),
        ];
    }
}
