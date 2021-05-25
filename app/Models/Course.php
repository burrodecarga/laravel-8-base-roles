<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded =['id','status'];

    protected $withCount =['students','reviews'];


    const BORRADOR=1;
    const REVISION=2;
    const PUBLICADO=3;


    public function getRatingAttribute()
    {

           return $this->reviews->avg('rating');
    

     }


    public function teacher()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function level()
    {
        return $this->hasOne(Leave::class);
    }

    public function price()
    {
        return $this->hasOne(Price::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirements::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function audiences()
    {
        return $this->hasMany(Audiences::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class,Section::class);
    }

}
