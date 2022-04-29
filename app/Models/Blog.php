<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blogs";

    protected $fillable = ["title","content","image"];
    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {

        return url('images/' . $this->image);

    }

}
