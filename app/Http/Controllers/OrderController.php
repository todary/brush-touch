<?php

namespace App\Http\Controllers;

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

    public function createOrder(Request $request)
    {
        try {
            $order = $this->orderService->createOrder($request->all());
            $orderResource = new OrderResource($order);
            return response()->json([
                'status' => 'success',
                'order' => $orderResource,
                'message' => __('messages.order_success')
            ]);
        } catch (ValidationException $e) {
            return new ValidationErrorResource($e->errors());
        }
    }
}
