<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public  function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public  function author()
    {
        return $this->hasOne(User::class,'id','created_by');

    }

}
