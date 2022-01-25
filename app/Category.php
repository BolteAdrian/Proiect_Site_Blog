<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

   // Category.php
public function posts()
{
    return $this->belongsToMany(Post::class);
}

}
