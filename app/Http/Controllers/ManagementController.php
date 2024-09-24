<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Sessionllers;



class ManagementController extends Controller
{
    public function index()
    {
        $managers = User::where('role', 'manager')->get();
        return view('dashboard.management.auth.register', compact('managers'));
    }
    // create session here.
    public function store_register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => 'required|in:manager,blogger,user',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);
    }


    // acctiv  deactive session here.
    public function manager_down($id)
    {
        $managers = User::where('id', $id)->first();


        if ($managers->role == 'manager') {
            User::find($managers->id)->update([
                'role' => 'user',
                'updated_at' => now(),
            ]);
            return back()->with('management.index', "Manager Demotion Seccsfull...");
        }
    }

     // delete session start here
     public function manage_distory($id){
        $managers = User::where('id',$id)->first();
        User::find($managers->id)->delete();
        return back()->with('management.index' , "Management Delete Successfull...");

    }
}
