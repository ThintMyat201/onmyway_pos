<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class storeSession extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    protected $casts = [
        'opened_at' => 'datetime',
        'closed_at' => 'datetime'
    ];

    public function sales() {
        return $this->hasMany(sale::class, 'store_session_id');
    }
}
