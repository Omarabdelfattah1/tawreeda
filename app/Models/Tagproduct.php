<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagproduct extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id'];

    protected $appends = ['requests'];

    public function getRequestsAttribute(){
        return $this->requests();
    }
    public function suppliers(){
        return $this->belongsToMany(Supplier::class);
    }
    public function requests(){
        return $this->belongsToMany(Request::class);
     }
}
