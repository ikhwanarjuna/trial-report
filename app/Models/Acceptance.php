<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceptance extends Model
{

    protected $guarded = ['id'];

    public function acceptance_result(){
    return $this->belongsTo(AcceptanceResult::class);
    }
    use HasFactory;
    use Uuid;
}
