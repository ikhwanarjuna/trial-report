<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable=[
        'id',
        'document_number',
        'trial_type',
        'trial_note',
        'item_code',
        'family_product',
        'item_name',
        'size',
        'note',
        'approval_created_by',
        'approval_created_date',
        'approval_plant_head_name',
        'approval_plant_head_date',
        'approval_ppic_name',
        'approval_ppic_date',
        'approval_gm_name',
        'approval_gm_date', 
        'costing_approved',
        'costing_staff_name',
        'costing_approval_name',
        'costing_approval_date',
        
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
