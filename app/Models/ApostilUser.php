<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApostilUser extends Model
{
    use HasFactory;

    protected $table = "apostil_users";

    protected $guarded = [];
}
