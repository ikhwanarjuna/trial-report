<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceptance_Result extends Model
{

    protected $guarded = ['id'];

    public function criteria(){
        return $this->hasMany(Criteria::class);
    }

    public function trial(){
        return $this->belongsTo(Trial::class);
    }
    use HasFactory;
    use Uuid;
}
