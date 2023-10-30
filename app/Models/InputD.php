<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputD extends Model
{
    use HasFactory;

    protected $table = 'inputd';

    protected $guarded = ['id'];
}
