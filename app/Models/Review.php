<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'buyer_id',
        'supplier_id',
        'comment',
        'title',
        'stars'
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
