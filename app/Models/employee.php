<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Laravel\Sanctum\HasApiTokens;
class employee extends Eloquent
{
    use HasFactory;
}