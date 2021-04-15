<?php


namespace App\Http\ViewModels\Orders;


use App\Domain\Orders\OrderFiles\Model\OrderFile;

use Illuminate\Contracts\Support\Arrayable;

class OrderFilesIndexVM implements Arrayable
{

    private $orderFiles ;
    public function __construct()
    {
        $this->orderFiles= array();
        $orderFiles = OrderFile::all();
        foreach ($orderFiles as $orderFile){
            $order= new ShowOrderFileVM($orderFile);
            array_push($this->orderFiles,$order->toArray());
        }
    }

    public function toArray()
    {
        return [
          'order Files' => $this->orderFiles
        ];
    }
}
