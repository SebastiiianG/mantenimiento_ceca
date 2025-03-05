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
		return $this->belongsTo(CgKindPerson::class, 'kperson_delivery');
    }

	public function cgAcademicArea()
	{
		return $this->belongsTo(CgAcademicArea::class, 'cg_academic_area_id');
	}

    public function cgDependency()
    {
        return $this->belongsTo(CgDependency::class, 'cg_dependency_id');
    }

	// Relación con User (para ceca_receives)
    public function cecaReceives()
    {
        return $this->belongsTo(User::class, 'ceca_receives');
    }

    // Relación con User (para ceca_deliveries)
    public function cecaDeliveries()
    {
        return $this->belongsTo(User::class, 'ceca_deliveries');
    }


	public function orderDevices()
	{
		return $this->hasMany(OrderDevice::class);
	}
}
