<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentSponsor extends Model
{
    use HasFactory;
    protected $table = "apartment_sponsor";
    protected $fillable = [
        "apartment_id",
        "sponsor_id"
    ];
}
