<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    use HasFactory;

    protected $table = 'image_gallery';

    protected $fillable = [
        'apartment_id',
        'path_image',
    ];

    protected $appends = [
        'full_path_image_gallery',
        // 'sponsored',
    ];

    public function getFullPathImageGalleryAttribute(){
        $fullPath = null;
        if($this->path_image)
            $fullPath = asset('storage/'.$this->path_image);
        return $fullPath;
    }

    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }
}
