<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputA extends Model
{
    use HasFactory;

    protected $table = 'inputa';


    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
