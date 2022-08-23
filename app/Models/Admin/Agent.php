<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Service;
use App\Models\User\Nstage;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'tel',
        'fonction',
        'id_service',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }

    public function nstage()
    {
        return $this->hasMany(Nstage::class);
    }
}
