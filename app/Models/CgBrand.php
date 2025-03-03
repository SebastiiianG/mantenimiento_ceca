<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CgBrand extends Model
{
    use HasFactory;

    protected $fillable = ['brand_name'];


    public function orderDevices()
	{
		return $this->hasMany(OrderDevice::class);
	}
}
