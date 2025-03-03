<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CgKindPerson extends Model
{
    use HasFactory;

    protected $fillable = ['kind_person'];

    public function orderDevices(){
        return $this->hasMany(OrderDevice::class);
    }
}
