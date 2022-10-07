<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function member() {
        return $this->hasMany(User::class, 'school_id', 'id');
    }
}
