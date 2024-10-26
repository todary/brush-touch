<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ValidationErrorResource extends JsonResource
{
    public function toArray($request)
    {
        $formattedErrors = [];

        foreach ($this->resource as $field => $messages) {
            foreach ($messages as $message) {
                $formattedErrors[] = $message;
            }
        }
        return [
            'status' => 'error',
            'message' => __('messages.validation_failed'),
            'errors' => $formattedErrors,
        ];
    }
}
