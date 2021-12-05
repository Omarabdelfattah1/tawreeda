<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'type',
        'userable_type',
        'userable_id'
    ];


    public function reportable(){
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reason(){
        $reason = '';
        switch($this->type){
            case 'تقييم':
                $reason = "الرجاء مراجعة هذا التقييم";
                break;
        }
    }
}
