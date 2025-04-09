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


	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function cgKindObject() {
        return $this->belongsTo(CgKindObject::class, 'cg_kind_object_id');
    }

    public function cgBrand() {
        return $this->belongsTo(CgBrand::class, 'cg_brand_id');
    }

    public function cgKindFailure() {
        return $this->belongsTo(CgKindFailure::class, 'cg_kind_failure_id');
    }

	public function cecaRepair()
	{
		return $this->belongsTo(User::class);
	}

	public function computers()
	{
		return $this->hasOne(Computer::class);
	}
}
