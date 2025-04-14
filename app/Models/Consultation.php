<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'user_detail_id',
        'scheduled_at', // Add this
        // other fillable fields...
    ];

    // Recommended: Cast to Carbon instance
    protected $casts = [
        'scheduled_at' => 'datetime', // Add this
    ];

    // Relationships (assuming they exist)
    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function userDetail() {
        return $this->belongsTo(UserDetail::class);
    }
}