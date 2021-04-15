<?php


namespace App\Domain\General\Sitinfo\Actions;


use App\Domain\General\Sitinfo\DTO\SitinfoDTO;
use App\Domain\General\Sitinfo\Model\Sitinfo;

class UpdateConvertionAction
{
    public function execute(Sitinfo $sitinfo, SitinfoDTO $sitinfoDTO){
        $sitinfo->update($sitinfoDTO->toArray());
        return $sitinfo;
    }
}
