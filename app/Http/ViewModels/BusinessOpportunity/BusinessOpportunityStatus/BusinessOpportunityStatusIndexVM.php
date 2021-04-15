<?php

namespace App\Http\ViewModels\BusinessOpportunity\BusinessOpportunityStatus;

use App\Domain\BusinessOpportunity\BusinessOpportunityStatus\Models\BusinessOpportunityActivity;

class BusinessOpportunityStatusIndexVM
{
    public function businessOpportunityStatuses(){
        return BusinessOpportunityActivity::all();
    }

    public function toArray()
    {
        return [
            'businessOpportunityStatuses' => $this->businessOpportunityStatuses(),
        ];
    }
}
