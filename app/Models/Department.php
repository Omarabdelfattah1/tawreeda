<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function getImgAttribute(){
        return $this->getAttributes()['img'] ? 'storage/'. $this->getAttributes()['img'] : 'my-profile.png';
    }
}
