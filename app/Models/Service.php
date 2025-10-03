<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Consultation;

class Service extends Model
{
    protected $fillable = ['logo', 'icon_bg_color', 'name', 'description'];

    public function consultations(): HasMany
    {
        return $this->hasMany(Consultation::class);
    }
    
}
