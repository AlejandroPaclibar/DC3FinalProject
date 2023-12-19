<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_item extends Model
{
    use HasFactory;

    
    public function purchase() {
        return $this->belongsTo(Purchase::class);
    }

    public function merchandise() {
        return $this->belongsTo(Merchandise::class);
    }

    protected $guarded = [];
}
