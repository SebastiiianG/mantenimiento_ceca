<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'date_generation',
        'date_reception',
        'delivery_date',
        'status',
        'client_deliveries',
        'client_receives',
        'phone_number',
        'ext',
        'cell_number',
        'mail',
        'kperson_delivery',
        'cg_academic_area_id',
        'cg_dependency_id',
        'ceca_receives',
        'ceca_deliveries',
    ];

    public function cgKindPeople()
	{
		return $this->belongsTo(CgKindPerson::class);
    }

	public function cgAcademicAreas()
	{
		return $this->belongsTo(CgAcademicArea::class);
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
