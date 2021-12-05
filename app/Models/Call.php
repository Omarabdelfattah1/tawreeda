<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'buyer_id',
        'from_time',
        'to_time',
        'date',
        'way',
        'status'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }
}
