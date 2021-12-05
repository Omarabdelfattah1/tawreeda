<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'supplier_id',
        'delivary',
        'ready-after',
        'available-for',
        'payment_way',
        'state',
        'notes'
    ];
    public static function boot() {
        parent::boot();
  
        static::deleting(function($offer) {
           $offer->files()->delete();
           $offer->items()->delete();
  
        });
    }

    public function items()
    {
        return $this->hasMany(OfferItem::class,'offer_id');
    }
    public function request(){
        return $this->belongsTo(Request::class);
    }
    public function files(){
        return $this->morphMany(File::class,'fileable');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
