<?php


namespace App\Domain\General\Sitinfo\Actions;


use App\Domain\General\Sitinfo\Model\Sitinfo;

class DeleteConvertionAction
{
    public function execute(Sitinfo $sitinfo){
        $sitinfo ->delete();
        return "deleted successfully." ;
    }
}
