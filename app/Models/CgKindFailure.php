<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CgKindFailure extends Model
{
    use HasFactory;

    protected $fillable = ['failure'];

    public function orderDevices()
	{
		return $this->hasMany(OrderDevice::class);
	}

}
