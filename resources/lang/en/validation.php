<?php
return [
    'required' => 'The :attribute field is required.',
    'email' => 'The :attribute must be a valid email address.',
    'max' => [
        'string' => 'The :attribute must not be greater than :max characters.',
    ],
    'min' => [
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'confirmed' => 'The :attribute confirmation does not match.',
    'unique' => 'The :attribute has already been taken.',
    'custom' => [
        'id_user.required' => 'User ID is required.',
        'id_user.exists' => 'The selected user does not exist.',
        'services.required' => 'You must specify at least one service.',
        'services.array' => 'The services field must be an array.',
        'services.*.service_id.required' => 'Service :service must have an ID.',
        'services.*.service_id.exists' => 'The selected service :service does not exist.',
        'services.*.hours.required' => 'Service :service must specify hours.',
        'services.*.hours.integer' => 'Hours for service :service must be an integer value.',
        'services.*.hours.min' => 'Hours for service :service must be at least :min.',
    ],
];


