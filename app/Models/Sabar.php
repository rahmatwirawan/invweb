<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sabar extends Model
{
    use HasFactory;
    protected $table = 'sabars';
    protected $guarded = ['id'];
}
