<?php

namespace App\Models;

use App\Models\Plant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classification extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
