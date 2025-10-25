<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    protected $fillable = ['user_id', 'product_id', 'quantity', 'total','description', 'store_session_id'];
    public function product() {
        return $this->belongsTo(product::class, 'product_id');
    }
}
