<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_device_id',
        'password',
    ];
    
    public function orderDevices()
	{
		return $this->belongsTo(OrderDevice::class);
	}
}
