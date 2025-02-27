<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function cgKindPeople()
	{
		return $this->belongsTo(CgKindPerson::class);
    }

	public function cgDependencies()
	{
		return $this->belongsTo(CgDependency::class);
	}

	public function users()
	{
		return $this->belongsTo(User::class);
	}

	public function orderDevices()
	{
		return $this->hasMany(OrderDevice::class);
	}
}
