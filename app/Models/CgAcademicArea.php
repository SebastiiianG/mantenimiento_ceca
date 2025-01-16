<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CgAcademicArea extends Model
{
    use HasFactory;

    protected $guarded = [ ];

    public function cgDependency()
    {
        return $this->belongsTo(CgDependency::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
