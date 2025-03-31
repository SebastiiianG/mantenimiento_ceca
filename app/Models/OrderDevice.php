<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'client_observations',
        'diagnostic',
        'ceca_observations',
        'status',
        'computer',
        'assigned',
        'serial_number',
        'cg_brand_id',
        'order_id',
        'cg_kind_failure_id',
        'cg_kind_object_id',
        'ceca_repairs',
    ];

    public function cgBrands()
	{
		return $this->belongsTo(CgBrand::class);
	}

	public function orders()
	{
		return $this->belongsTo(Order::class);
	}

	public function cgKindFailures()
	{
		return $this->belongsTo(CgKindFailure::class);
	}

	public function cgKindObjects()
	{
		return $this->belongsTo(CgKindObject::class);
	}

	public function cecaRepairs()
	{
		return $this->belongsTo(User::class);
	}

	public function computers()
	{
		return $this->hasOne(Computer::class);
	}
}
