<?php

namespace App\Http\ViewModels\BusinessOpportunity\BusinessOpportunityCommentContent;

use App\Domain\BusinessOpportunity\BusinessOpportunityCommentContent\Models\BusinessOpportunityCommentContent;

class BusinessOpportunityCommentContentIndexVM
{
    public function businessOpportunityCommentContents(){
        return BusinessOpportunityCommentContent::all();
    }

    public function toArray()
    {
        return [
            'businessOpportunityCommentContents' => $this->businessOpportunityCommentContents(),
        ];
    }
}
