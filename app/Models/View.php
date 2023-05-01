<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'apartment_id',
        'ip_address',
        'created_at',
    ];

    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }
}
