<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;
    use Uuid;

    public function trial_approval(){
        return $this->belongsTo(Trial_Approval::class);
    }
}
