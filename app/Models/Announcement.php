<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'message',
        'publish_date',
    ];

    protected $casts = [
        'publish_date' => 'date',
    ];

    /**
     * Boot method to set default publish_date
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($announcement) {
            if (empty($announcement->publish_date)) {
                $announcement->publish_date = now();
            }
        });
    }
}
