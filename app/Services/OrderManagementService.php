<?php

namespace App\Services;

use App\Services\OrderHandlers\ValidationHandler;
use App\Services\OrderHandlers\OrderCreationHandler;
use App\Services\OrderHandlers\ServiceAttachmentHandler;

class OrderManagementService
{
    public function createOrder(array $services)
    {
        $validationHandler = new ValidationHandler();
        $orderCreationHandler = new OrderCreationHandler();
        $serviceAttachmentHandler = new ServiceAttachmentHandler();
        $validationHandler->setNext($orderCreationHandler)->setNext($serviceAttachmentHandler);
        return $validationHandler->handle(['services' => $services]);
    }
}
