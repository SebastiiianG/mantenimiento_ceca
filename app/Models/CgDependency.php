<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CgDependency extends Model
{
    use HasFactory;

    public function cgAcademicAreas()
	{
		return $this->hasMany(CgAcademicArea::class);
	}

}
