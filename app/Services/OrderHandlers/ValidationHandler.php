<?php
namespace App\Services\OrderHandlers;

use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ValidationHandler implements HandlerInterface
{
    private $nextHandler;

    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(array $data)
    {
        if (isset($data['services']['services'])) {
            $data['services'] = $data['services']['services'];
        }
        Validator::make($data, [
            'services' => 'required|array',
            'services.*.service_id' => [
                'required',
                'exists:services,id',
                function ($attribute, $value, $fail) {
                    $service = Service::find($value);

                    if ($service && $service->status !== 1) {
                        $fail(__('messages.service_inactive'));
                    }
                },
            ],
            'services.*.hours' => 'required|integer|min:1',
        ])->validate();

        if ($this->nextHandler) {
            return $this->nextHandler->handle($data);
        }
    }


}
