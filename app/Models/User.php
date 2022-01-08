<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Storage;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'name',
        'email',
        'mobile',
        'locked',
        'password',
        'summary',
        'userable_id',
        'userable_type',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
            Storage::delete('public/'.$user->path);
             // do the rest of the cleanup...
        });
    }

    public function getPhotoAttribute(){
        return $this->getAttributes()['photo'] ? 'storage/'. $this->getAttributes()['photo'] : 'my-profile.png'; 
    }
    public function userable()
    {
        return $this->morphTo();
    }

    
}
