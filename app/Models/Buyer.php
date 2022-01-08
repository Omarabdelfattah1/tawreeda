<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_type',
        'company_name',
        'company_logo',
        'company_address'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($buyer) { // before delete() method call this
            $buyer->user()->delete();
            $buyer->requests()->delete();
        });
    }

    public function getCompanyLogoAttribute(){
        return $this->getAttributes()['company_logo'] ? 'storage/'. $this->getAttributes()['company_logo'] : 'my-profile.png'; 
    }
    public function user()
    {
        return $this->morphOne(User::class,'userable');

    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function calls()
    {
        return $this->hasMany(Call::class);
    }


}
