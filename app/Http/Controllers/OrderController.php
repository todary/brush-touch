<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ValidationErrorResource;
use App\Services\OrderManagementService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderManagementService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function createOrder(ValidateOrderRequest $request)
    {
        try {
            $order = $this->orderService->createOrder($request->services);

            $orderResource = new OrderResource($order);

            return response()->json([
                'status' => 'success',
                'order' => $orderResource, // Change this to 'order' instead of 'orders'
                'message' => __('messages.order_success')
            ]);
        } catch (ValidationException $e) {
            return new ValidationErrorResource($e->errors());
        }
    }

}
