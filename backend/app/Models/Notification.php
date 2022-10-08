<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'link',
    ];

    public function sender() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function receiver() {
        return $this->belongsToMany(User::class, 'notifications_users', 'notification_id', 'user_id')->withTimestamps();
    }
}