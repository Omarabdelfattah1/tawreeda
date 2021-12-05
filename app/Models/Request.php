<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'buyer_id',
        'category_id',
        'department_id',
        'description',
    ];
    public static function boot() {
      parent::boot();

      static::deleting(function($request) {
         $request->tagproducts()->detach();
         $request->files()->delete();
         $request->offers()->delete();

      });
  }
    public function buyer()
    {
       return $this->belongsTo(Buyer::class);
    }
    public function category()
    {
       return $this->belongsTo(Category::class);
    }
    public function department()
    {
       return $this->belongsTo(Department::class);
    }

    public function files(){
       return $this->morphMany(File::class,'fileable');
    }

    public function offers()
    {
       return $this->hasMany(Offer::class);
    }

    public function tagproducts(){
       return $this->belongsToMany(Tagproduct::class);
    }
}
