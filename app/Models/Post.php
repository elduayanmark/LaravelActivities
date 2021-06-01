<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    use HasFactory;

    protected $fillable = ['title','description'];
    public $timestamps = false;

}
