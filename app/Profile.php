<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded= [];

    protected $appends = ['image_link'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getImageLinkAttribute()
    {
        if (!empty($this->pic)) {
            return url($this->pic);
        } else {
            return url('assets/imgs/noimage.png');
        }
    }
}