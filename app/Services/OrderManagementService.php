<?php

namespace App\Services;

use App\Jobs\SendOrderDetails;
use App\Models\Order;
use App\Models\Service;
use App\Models\OrderService;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class OrderManagementService
{
    public function createOrder(array $services)
    {
        DB::beginTransaction();

        try {
            $user = auth()->user();
            $totalPrice = 0;

            $serviceIds = array_column($services, 'service_id');
            $availableServices = Service::whereIn('id', $serviceIds)->get()->keyBy('id');
            foreach ($services as $service) {
                $serviceId = $service['service_id'];
                $hours = $service['hours'];
                $price = $availableServices[$serviceId]->price * $hours;
                $totalPrice += $price;
            }
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => $totalPrice,
                'order_status' => Order::STATUS_PENDING,
            ]);

            $this->attachServicesToOrder($order, $services, $availableServices);
            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Order creation failed: ' . $e->getMessage());
            throw new ValidationException(
                Validator::make([], [
                    'error' => __('messages.order_failed'),
                ])
            );
        }
    }
    private function attachServicesToOrder(Order $order, array $services, $availableServices): void
    {
        $orderServices = collect($services)->map(function ($service) use ($order, $availableServices) {
            $serviceId = $service['service_id'];
            $hours = $service['hours'];
            $price = $availableServices[$serviceId]->price * $hours;
            return [
                'service_id' => $serviceId,
                'order_id' => $order->id,
                'hours' => $hours,
                'total_price' => $price,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->all();
        OrderService::insert($orderServices);
    }

}
