<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guarded = [];


    public function getRouteKeyName()
    {
        return 'uuid';
    }


    // Define relationship between Note and User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
