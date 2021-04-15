<?php


namespace App\Http\ViewModels\General\SalaryTypes;

use App\Domain\Employees\SalaryTypes\Model\SalaryType;
use Illuminate\Contracts\Support\Arrayable;


class ShowSalaryTypeVM implements Arrayable
{

    private $SalaryType;

    public function __construct($SalaryTypeId)
    {
        $this->SalaryType = SalaryType::find($SalaryTypeId) ;
    }
    public function toArray()
    {
        return [
            'SalaryType' => $this->SalaryType
        ];
    }
}
