<?php


namespace App\Domain\General\Services\Actions;


use App\Domain\General\Services\DTO\ServiceDTO;
use App\Domain\General\Services\Model\Service;
use Illuminate\Support\Facades\Auth;

class UpdateServiceAction
{

    public static function execute(
        ServiceDTO $ServiceDTO
    ){
        $Service = Service::find($ServiceDTO->id);
        $Service->update(array_filter($ServiceDTO->toArray()));
        $Service->save();
        return $Service;
    }
}
