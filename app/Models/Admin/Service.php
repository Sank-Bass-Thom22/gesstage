<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Agent;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'servicename',
    ];

    public function agent()
    {
        return $this->hasMany(Agent::class);
    }

}
