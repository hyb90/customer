<?php


namespace App\Http\ViewModels\General\SalaryTypes;


use App\Domain\Employees\SalaryTypes\Model\SalaryType;
use Illuminate\Contracts\Support\Arrayable;

class SalaryTypesIndexVM implements Arrayable
{

    public function salaryTypes(){
        return SalaryType::all();
    }

    public function toArray()
    {
        return [
            'salary_types' => $this->salaryTypes(),
        ];
    }
}
