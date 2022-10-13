<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'country_id',
        'name',
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
