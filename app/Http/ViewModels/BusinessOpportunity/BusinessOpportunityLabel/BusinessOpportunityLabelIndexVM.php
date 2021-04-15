<?php

namespace App\Http\ViewModels\BusinessOpportunity\BusinessOpportunityLabel;

use App\Domain\BusinessOpportunity\BusinessOpportunityLabel\Models\BusinessOpportunityLabel;

class BusinessOpportunityLabelIndexVM
{
    public function businessOpportunityLabels(){
        return BusinessOpportunityLabel::all();
    }

    public function toArray()
    {
        return [
            'businessOpportunityLabels' => $this->businessOpportunityLabels(),
        ];
    }
}