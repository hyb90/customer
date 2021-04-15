<?php

namespace App\Http\ViewModels\BusinessOpportunity\BusinessOpportunity;

use App\Domain\BusinessOpportunity\BusinessOpportunity\Models\BusinessOpportunity;

class BusinessOpportunityIndexVM
{
    public function businessOpportunities(){
        $bos = BusinessOpportunity::all();
        $bos->map(function ($bo){
            $bo->setAttribute('labels',$bo->labels);
        });
        return $bos;
    }

    public function toArray()
    {
        return [
            'businessOpportunities' => $this->businessOpportunities(),
        ];
    }
}
