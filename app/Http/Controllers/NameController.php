<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

      return back()->with('name_update',"Name Update Success $old_Name ..!!");
    }

    public function email_update(Request $request){

     $request ->validate([
        'email' => 'required'
     ]);
     User::find(Auth::user()->id)->update([
        'email' => $request->email,
        'updated_at' => now(),
      ]);
      return back()->with('email_update',"Email Update SuccessFull..!!");;
    }

    public function password_update(Request $request){
       $request -> validate([
        'c_password' => 'required',
        'password' => 'required|min:8|confirmed',
       ]);
       if(Hash::check($request ->c_password, auth()->user()->password)){
        User::find(Auth::user()->id)->update([
            'password' => $request->password,
            'updated_at' => now(),

          ]);
          return back()->with(['password_update' => " password update SeccesFull...!!"]);
       }else{
        return back()->withErrors(['c_password' => "Current password dosen't match record"]);
       }
    }


    public function image_update(Request $request){
        $request->validate([
            'image' => 'required|image',
        ]);

        if($request->hasFile('image')){
            $newname = auth()->id() . '-' . rand(1111,9999) . '.' . $request->file('image')->getClientOriginalExtension();
            return $newname;
}
}
}
