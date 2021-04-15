<?php


namespace App\Http\ViewModels\General\Users;


use App\Domain\Customers\Customer\Model\Customer;
use App\Domain\Customers\CustomerVsLabels\Model\CustomerVsLabel;
use App\Domain\Employees\Employee\Model\Employee;
use App\Domain\Employees\EmployeeVsLabels\Model\EmployeeVsLabel;
use App\Domain\General\Users\UserResions\Model\UserRegion;
use App\Domain\Vendors\Model\Vendor;
use App\Models\User;
use Illuminate\Contracts\Support\Arrayable;

class ShowUserVM implements Arrayable
{
    private $user;

    public function __construct(User $user,$type,$no_details = null)
    {
        $user = User::find($user->id);
        $user_labels = Array();
        $specific_user = null ;
        switch (strtolower($type)){
            case "customer":
                $specific_user = Customer::where('user_id',$user->id)->first();
                $user_labels = CustomerVsLabel::where('customer_id',$user->id)->get();
                break;
            case "vendor":
                $specific_user = Vendor::where('user_id',$user->id)->first();
                break;
            default:
                $specific_user = Employee::where('user_id',$user->id)->first();
                $user_labels = EmployeeVsLabel::where('employee_id',$user->id)->get();
                break;

        }
        if($no_details == null)
        {
            $user_regions = UserRegion::where('user_id',$user->id)->get();

            $user->setAttribute($type." info",$specific_user);
            $user->setAttribute('user regions',$user_regions);
            $user->setAttribute('user labels',$user_labels);
        }

        $this->user = $user;
    }

    public function toArray($as_object = null)
    {
        if($as_object != null)
            return $this->user;

        return [
            'user' => $this->user
        ];
    }

}
