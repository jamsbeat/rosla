<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'email',
        'info',
        'name',
        'consultation_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

}
