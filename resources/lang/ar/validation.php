<?php
return [
    'required' => 'حقل :attribute مطلوب.',
    'email' => 'يجب أن يكون :attribute بريدًا إلكترونيًا صالحًا.',
    'max' => [
        'string' => 'يجب ألا يزيد :attribute عن :max حرفًا.',
    ],
    'min' => [
        'string' => 'يجب أن يكون :attribute على الأقل :min حرفًا.',
    ],
    'confirmed' => 'تأكيد :attribute غير متطابق.',
    'unique' => 'تم استخدام :attribute مسبقًا.',
    'custom' => [
        'id_user.required' => 'مطلوب رقم تعريف المستخدم.',
        'id_user.exists' => 'المستخدم المحدد غير موجود.',
        'services.required' => 'يجب تحديد خدمة واحدة على الأقل.',
        'services.array' => 'يجب أن يكون الحقل الخاص بالخدمات مصفوفة.',
        'services.*.service_id.required' => 'يجب أن يحتوي كل خدمة على رقم تعريف.',
        'services.*.service_id.exists' => 'الخدمة المحددة غير موجودة.',
        'services.*.hours.required' => 'يجب تحديد عدد الساعات لكل خدمة.',
        'services.*.hours.integer' => 'يجب أن يكون عدد الساعات رقمًا صحيحًا.',
        'services.*.hours.min' => 'يجب أن يكون عدد الساعات على الأقل :min.',
    ],
];
