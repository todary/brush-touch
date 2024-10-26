<?php
namespace App\Services\OrderHandlers;

use App\Jobs\SendOrderDetails;
use App\Models\OrderService;
use App\Models\Service;

class ServiceAttachmentHandler implements HandlerInterface
{
    private $nextHandler;

    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(array $data)
    {
        $order = $data['order'];
        $totalPrice = 0;

        foreach ($data['services'] as $serviceData) {
            $service = Service::findOrFail($serviceData['service_id']);
            $hours = $serviceData['hours'];
            $price = $service->price * $hours;
            $totalPrice += $price;

            OrderService::create([
                'service_id' => $service->id,
                'order_id' => $order->id,
                'hours' => $hours,
                'total_price' => $price,
            ]);
        }

        $order->update(['total_price' => $totalPrice]);
        // Dispatch the mail job after completing the order processing
        SendOrderDetails::dispatch($order);
        if ($this->nextHandler) {
            return $this->nextHandler->handle($data);
        }

        return $order;
    }
}
