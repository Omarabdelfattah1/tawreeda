<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['key','value'];

    public static function get($key){
        return self::where('key',$key)->first()->value ?? null;
    }
    public static function set($key,$value){
        $item = self::where('key',$key)->first();
        if (is_null($item)){
            $item = self::create([
                'key' => $key,
                'value' => $value,
            ]);
        }else{
            $item->value = $value;
            $item->save();
        }
        return $item;
    }

    public function getLogoAttribute(){
        $logo = self::get('logo');
        return 'storage/'. $logo;
    }
}
