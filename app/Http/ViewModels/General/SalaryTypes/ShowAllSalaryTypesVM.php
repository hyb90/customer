<?php


namespace App\Http\ViewModels\General\SalaryTypes;

use App\Domain\Employees\SalaryTypes\Model\SalaryType;
use Illuminate\Contracts\Support\Arrayable;

class ShowAllSalaryTypesVM implements Arrayable
{

    private $SalaryTypes;

    public function __construct(){

        $this->SalaryTypes = array();
        $SalaryTypes = SalaryType::all();
        foreach ($SalaryTypes as $SalaryType) {
            $one_SalaryType = new ShowSalaryTypeVM($SalaryType->id);
            array_push($this->SalaryTypes,$one_SalaryType->toArray());
        }
    }
    public function toArray()
    {
        return [
            'SalaryTypes' => $this->SalaryTypes
        ];
    }
}
