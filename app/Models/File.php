<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;
class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'path',
        'filable_type',
        'filable_id',
    ];
    public static function boot() {
        parent::boot();

        static::deleting(function($file) { // before delete() method call this
            Storage::delete('public/'.$file->path);
             // do the rest of the cleanup...
        });
    }
    public function fileable()
    {
        return $this->morphTo();
    }
}
