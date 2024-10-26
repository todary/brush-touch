<?php
namespace App\Services\OrderHandlers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderCreationHandler implements HandlerInterface
{
    private $nextHandler;

    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(array $data)
    {
        $user = Auth::user();
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => 0,
            'order_status' => Order::STATUS_PENDING,
        ]);

        $data['order'] = $order;

        if ($this->nextHandler) {
            return $this->nextHandler->handle($data);
        }

        return $order;
    }
}
