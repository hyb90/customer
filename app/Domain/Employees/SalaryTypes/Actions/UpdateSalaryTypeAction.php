<?php


namespace App\Domain\Employees\SalaryTypes\Actions;


use App\Domain\Employees\SalaryTypes\DTO\SalaryTypeDTO;
use App\Domain\Employees\SalaryTypes\Model\SalaryType;
use Illuminate\Support\Facades\Auth;

class UpdateSalaryTypeAction
{

    public static function execute(
        SalaryTypeDTO $SalaryTypeDTO
    ){
        $SalaryType = SalaryType::find($SalaryTypeDTO->id);
        $SalaryType->update(array_filter($SalaryTypeDTO->toArray()));
        $SalaryType->save();
        return $SalaryType;
    }
}
