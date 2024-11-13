<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cap_comuni extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'cap_comuni';

    protected $fillable = [
        'comune',
    ];
}
