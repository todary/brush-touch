<?php
namespace App\Services\OrderHandlers;

interface HandlerInterface
{
    public function setNext(HandlerInterface $handler): HandlerInterface;

    public function handle(array $data);
}

