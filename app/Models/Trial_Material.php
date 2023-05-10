<?php

namespace App\Models;


use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trial_Material extends Model
{
    use HasFactory;
    use Uuid;

    public function trial(){
        return $this->belongsTo(Trial::class);
    }
}


