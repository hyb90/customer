<?php


namespace App\Domain\Employees\Employee\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class EmployeeDTO extends DataTransferObject
{

    /* @var integer|null */
    public $user_id;
    /* @var integer|null */
    public $working_hours;
    /* @var integer|null */
    public $salary;
    /* @var string|null */
    public $start_work_date;
    /* @var string|null */
    public $end_work_date;
    /* @var integer|double|null */
    public $standard_cost_by_hour;
    /* @var string|null */
    public $current_timezone;

    public static function fromRequest($request){
        return new self([
            'user_id'           => $request['user_id'] ?? null,
            'working_hours'     => $request['working_hours'] ?? null,
            'salary'            => $request['salary'] ?? null,
            'start_work_date'            => $request['start_work_date'] ?? null,
            'end_work_date'            => $request['end_work_date'] ?? null,
            'standard_cost_by_hour'            => $request['standard_cost_by_hour'] ?? null,
            'current_timezone'            => $request['current_timezone'] ?? null,


        ]);
    }
}
