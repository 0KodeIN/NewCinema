<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Register extends Controller
{
    public function show($section,$id) {
        return 'новость под номером ' . $id . ' из раздела ' . $section;
     }
}
