<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CgDependency extends Model
{
    use HasFactory;

    protected $fillable = ['dependency_name'];

    public function cgAcademicAreas()
	{
		return $this->hasMany(CgAcademicArea::class);
	}
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
