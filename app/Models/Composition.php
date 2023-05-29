<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composition extends Model
{
    use HasFactory;
    use Uuid;

    protected $guarded = ['id'];

    public function trial(){
        return $this->belongsTo(Trial::class);
    }
}
