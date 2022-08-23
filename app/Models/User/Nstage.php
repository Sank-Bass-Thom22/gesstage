<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin\Agent;

class Nstage extends Model
{
    use HasFactory;
    protected $fillable = [
        'intitule',
        'datedebut',
        'datefin',
        'curriculumvitae',
        'motivation',
        'rapport',
        'theme',
        'id_agent',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'id_agent');
    }
}
