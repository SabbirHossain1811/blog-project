<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NameController extends Controller
{
    public function setting_index(){
        return view('dashboard.setting.index');
    }

    public function name_update(Request $request){
        $old_Name = Auth::user()->name;
      $request->validate([
        'name' => 'required',

      ]);
      User::find(Auth::user()->id)->update([
        'name' => $request->name,
        'updated_at' => now(),
      ]);

      return back()->with('name_update',"Name Update Success $old_Name to $request->name");
    }
}
