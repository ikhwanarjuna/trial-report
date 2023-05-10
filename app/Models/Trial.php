<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    use HasFactory;
    use Uuid;

    protected $guarded=[
        'id'
        
    ];

    public function trial_material(){
        return $this->hasMany(Trial_Material::class);
    }

    public function trial_approval(){
        return $this->hasOne(Trial_Approval::class);
    }

    public function trial_machine(){
        return $this->hasMany(Trial_Machine::class);
    }
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->whereid($value, $field)->firstOrFail();
    }
}
