<?php

namespace App\Models;

use App\Models\Classification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function classification()
    {
        return $this->hasOne(Classification::class);
    }
}
