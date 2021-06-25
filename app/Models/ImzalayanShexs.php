<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImzalayanShexs extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "imzalayan_shexsler";

    //protected $fillable = ['name'];
}
