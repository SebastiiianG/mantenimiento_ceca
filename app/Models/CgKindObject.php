<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CgKindObject extends Model
{
    use HasFactory;

    public function orderDevices(){
        return $this->hasMany(OrderDevice::class);
    }
}
