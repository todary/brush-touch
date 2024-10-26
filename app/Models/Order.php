<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'order_status',
    ];

    const STATUS_PENDING = 'Pending';
    const STATUS_IN_PROGRESS = 'In progress';
    const STATUS_COMPLETED = 'Completed';
    const STATUS_CANCELED = 'Canceled';
    const STATUS_REFUNDED = 'Refunded';

    public function user()
    {
        return $this->belongsTo(User::class); // Each order belongs to one user
    }

//    public function services()
//    {
//        return $this->belongsToMany(Service::class, 'order_service')
//            ->withPivot('hours')
//            ->withTimestamps();
//    }
    public function order_services()
    {
        return $this->hasMany(OrderService::class, 'order_id');
    }


    public function isInProgress()
    {
        return $this->order_status === self::STATUS_IN_PROGRESS;
    }

    public function setStatus(string $status)
    {
        if (in_array($status, [
            self::STATUS_PENDING,
            self::STATUS_IN_PROGRESS,
            self::STATUS_COMPLETED,
            self::STATUS_CANCELED,
            self::STATUS_REFUNDED
        ])) {
            $this->order_status = $status;
            $this->save();
        }
    }
}
