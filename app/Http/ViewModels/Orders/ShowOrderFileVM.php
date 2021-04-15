<?php


namespace App\Http\ViewModels\Orders;





use App\Domain\Orders\OrderFiles\Model\OrderFile;
use Illuminate\Contracts\Support\Arrayable;

class ShowOrderFileVM implements Arrayable
{
    private $orderFile;
    public function __construct(OrderFile $orderFile)
    {

        $this->orderFile = $orderFile;
    }



    public function toArray()
    {
        return $this->orderFile;
    }
}
