<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $uploaded_images = '/images/';

    protected $fillable = ['file'];

    public function getFileAttribute($photo) {

        return $this->uploaded_images . $photo;

    }

}
