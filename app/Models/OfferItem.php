<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'offer_id',
        'product_name',
        'amount',
        'unit',
        'unit_price',
        'total',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
