<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{
    protected $fillable = ['name', 'platform', 'instances', 'ignore_duplicates'];
}
