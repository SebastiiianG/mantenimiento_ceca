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
        'client_delivered',
        'client_received',
        'phone_number',
        'ext',
        'cell_number',
        'mail',
        'kperson_delivery',
        'cg_academic_area_id',
        'cg_dependency_id',
        'ceca_received',
        'ceca_delivered',
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

	// Relación con User (para ceca_received)
    public function cecaReceived()
    {
        return $this->belongsTo(User::class, 'ceca_received');
    }

    // Relación con User (para ceca_delivered)
    public function cecaDelivered()
    {
        return $this->belongsTo(User::class, 'ceca_delivered');
    }


	public function orderDevices()
	{
		return $this->hasMany(OrderDevice::class);
	}
}
