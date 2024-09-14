<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameController extends Controller
{
    public function name_index(){
        return view('dashboard.setting.name.index');
    }
}
