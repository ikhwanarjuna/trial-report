<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trial_Machine extends Model
{
    use HasFactory;
    use Uuid;

    protected $guarded = ['id'];

    public function trial(){
        return $this->belongsTo(Trial::class);
    }

    public function process(){
        return $this->hasMany(Process::class);
    }
    public function machine_parameter(){
        return $this->hasMany(Machine_Parameter::class);
    }
}
