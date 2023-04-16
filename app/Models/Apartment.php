<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'user_id',
        'slug',
        'description',
        'main_img',
        'max_guests',
        'rooms',
        'beds',
        'baths',
        'mq',
        'address',
        'latitude',
        'longitude',
        'price',
        'visible',
    ];

    public function getFullPathMainImgAttribute(){
        $fullPath = null;
        if($this->main_img)
            $fullPath = asset('storage/'.$this->main_img);
        return $fullPath;
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function views(){
        return $this->hasMany(View::class);
    }
    public function sponsors(){
        return $this->belongsToMany(Sponsor::class);
    }
    public function services(){
        return $this->belongsToMany(Service::class);
    }
}
