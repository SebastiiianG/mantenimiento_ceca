<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CgAcademicArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'academic_area',
        'cg_dependency_id'
    ];


    public function cgDependency()
    {
        return $this->belongsTo(CgDependency::class, 'cg_dependency_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
