<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineParameter extends Model
{
    use HasFactory;
    use Uuid;

    protected $guarded = ['id'];

    public function trial_machine(){
        return $this->belongsTo(TrialMachine::class);
    }
}
