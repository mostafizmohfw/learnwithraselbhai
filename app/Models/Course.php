<?php

namespace App\Models;

use App\Models\Platform;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    public function platform(){
        return $this->belongsTo(Platform::class);
    }
}
