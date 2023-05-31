<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trial_Machine_Result extends Model
{
    protected $guarded = ['id'];

    public function trial_machine(){
        return $this->belongsTo(Trial_Machine::class);
    }

    use HasFactory;
    use Uuid;
}
