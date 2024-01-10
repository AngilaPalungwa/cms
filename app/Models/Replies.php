<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;
    protected $table = 'replies';
    protected $guarded = ['id'];

    public function comment()
    {
        return $this->belongsTo(Comments::class);
    }
}
