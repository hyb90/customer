<?php


namespace App\Http\ViewModels\Orders;


use App\Domain\Orders\OrderCategories\Model\OrderCategory;
use App\Domain\Orders\OrderComments\Model\OrderComment;
use App\Domain\Orders\Orders\Model\Order;
use App\Http\ViewModels\General\Users\ShowUserVM;
use App\Models\User;
use App\Domain\Orders\OrderStatuses\Model\OrderStatus;
use App\Domain\Orders\OrderTypes\Model\OrderType;
use App\Domain\Orders\WorkOrders\Model\WorkOrder;
use App\Http\ViewModels\Orders\WorkOrders\ShowWorkOrderVM;

use Illuminate\Contracts\Support\Arrayable;

class ShowOrderVM implements Arrayable
{
    private $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->order->setAttribute('user',$this->get_user($order->user_id));
        $this->order->setAttribute('Order_Status',$this->get_status($order->order_status_id));
        $this->order->setAttribute('Order_Type',$this->get_type($order->order_type_id));
    }

    public function get_user($user_id){
        $user = User::find($user_id);
        $role_name = $user->role()->first();
        if($role_name)
            $role_name = $role_name->name;
        $user = new ShowUserVM($user,$role_name,true);
        return $user->toArray(true);
    }
    public function get_status($order_status_id){
        $order_status = OrderStatus::find($order_status_id);
        $order_status= new ShowOrderStatusVM($order_status);
        return $order_status->toArray();
    }
    public function get_type($order_type_id){
        $order_type= OrderType::find($order_type_id);
        $order_type= new ShowOrderTypeVM($order_type);
        return $order_type->toArray();
    }
    public function toArray()
    {
        return $this->order;
    }
}
