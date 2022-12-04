<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    use HasFactory;

    protected $fillable = [
        'instagram',
        'facebook',
        'email',
        'phones',
        'team_photo',
        'team_description',
        'company_name',
        'company_logo',
        'state',
        'employees_number',
        'company_CRN',
        'company_TXCard',
        'company_cataloge',
        'company_address',
        'about',
        'type',
        'slug',
        'production',
        'quality'
    ];
    public static function boot() {
        parent::boot();

        static::deleting(function($supplier) { // before delete() method call this
            $supplier->user()->delete();
            $supplier->offers()->delete();
        });
    }


    public function getCompanyLogoAttribute(){
        return $this->attributes['company_logo'] ? 'storage/'. $this->attributes['company_logo'] : 'my-profile.png';
    }
    public function getCompanyCatalogeAttribute(){
        return $this->attributes['company_cataloge'] ? 'storage/'. $this->attributes['company_cataloge'] : 'my-profile.png';
    }
    public function user()
    {
        return $this->morphOne(User::class,'userable');
    }
    public function files()
    {
        return $this->morphMany(File::class,'fileable');
    }

    public function tagproducts()
    {
        return $this->belongsToMany(Tagproduct::class,'supplier_tagproduct');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function calls()
    {
        return $this->hasMany(Call::class);
    }

    public function stars(){
        return (int)$this->reviews->avg('stars');
    }
    public function quality_files()
    {
        return $this->files()->where('type','quality')->get();
    }
    public function production_files()
    {
        return $this->files()->where('type','production')->get();
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function requests(){

        return $this->hasManyDeep('App\Models\Request',['supplier_tagproduct','App\Models\Tagproduct','request_tagproduct']);
    }

    public function getTeamPhotoAttribute(){
        return $this->attributes['team_photo'] ? $this->attributes['team_photo'] :  '/assets/team.png';
    }
}
