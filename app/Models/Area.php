<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name', 'keterangan'];
    use HasFactory;
    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
