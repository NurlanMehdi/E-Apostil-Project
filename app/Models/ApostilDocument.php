<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApostilDocument extends Model
{
    use HasFactory;

    protected $table = "apostil_documents";

    protected $guarded = [];

    public $timestamps = false;

}
