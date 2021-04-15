<?php

namespace App\Http\ViewModels\BusinessOpportunity\BusinessOpportunityActivity;

use App\Domain\BusinessOpportunity\BusinessOpportunityStatus\Models\BusinessOpportunityActivity;

class BusinessOpportunityActivityIndexVM
{
    public function businessOpportunityActivities(){
        return BusinessOpportunityActivity::all();
    }

    public function toArray()
    {
        return [
            'businessOpportunityActivities' => $this->businessOpportunityActivities(),
        ];
    }
}
