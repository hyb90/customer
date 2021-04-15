<?php


namespace App\Domain\Employees\SalaryTypes\Actions;


use App\Domain\Employees\SalaryTypes\DTO\SalaryTypeDTO;
use App\Domain\Employees\SalaryTypes\Model\SalaryType;
use Illuminate\Support\Facades\Auth;

class CreateSalaryTypeAction
{
    public static function execute(
        SalaryTypeDTO $SalaryTypeDTO
    ){

        $SalaryType = new SalaryType(array_filter($SalaryTypeDTO->toArray()));
        $SalaryType->save();
        return $SalaryType ;
    }
}
