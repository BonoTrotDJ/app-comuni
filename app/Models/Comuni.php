<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comuni extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'comuni';

    protected $fillable = [
        'comune',
    ];
}
