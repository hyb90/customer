<?php

namespace App\Http\ViewModels\BusinessOpportunity\BusinessOpportunityComment;

use App\Domain\BusinessOpportunity\BusinessOpportunityComment\Models\BusinessOpportunityComment;

class BusinessOpportunityCommentIndexVM
{
    public function businessOpportunityComments(){
        return BusinessOpportunityComment::all();
    }

    public function toArray()
    {
        return [
            'businessOpportunityComments' => $this->businessOpportunityComments(),
        ];
    }
}
