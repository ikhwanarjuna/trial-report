<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trial_Approval extends Model
{
    use HasFactory;
    use Uuid;

    public function trial(){
        return $this->belongsTo(Trial::class);
    }

    public function process(){
        return $this->hasMany(Process::class);
    }
}
