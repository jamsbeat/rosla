<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'user_id',
        'scheduled_at', // Add this
        // other fillable fields...
        'address',
        'info',
    ];

    // Recommended: Cast to Carbon instance
    protected $casts = [
        'scheduled_at' => 'datetime', // Add this
    ];

    // Relationships (assuming they exist)
    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}