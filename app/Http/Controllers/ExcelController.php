<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function Countrys(array $row)
    {
        return new Country($row[0]);
    }
}
