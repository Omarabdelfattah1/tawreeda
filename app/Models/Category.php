<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'name',
        'img'
    ];

    public function Department()
    {
        return $this->belongsTo(Department::class);
    }
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class);
    }

    public function tagproducts()
    {
        return $this->hasMany(Tagproduct::class);
    }
}
