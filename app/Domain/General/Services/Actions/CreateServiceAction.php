<?php


namespace App\Domain\General\Services\Actions;


use App\Domain\General\Services\DTO\ServiceDTO;
use App\Domain\General\Services\Model\Service;
use Illuminate\Support\Facades\Auth;

class CreateServiceAction
{
    public static function execute(
        ServiceDTO $ServiceDTO
    ){

        $Service = new Service(array_filter($ServiceDTO->toArray()));
        $Service->save();
        return $Service ;
    }
}
