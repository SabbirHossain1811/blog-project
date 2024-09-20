<?php

namespace App\Http\Controllers;

use App\Models\Cetegory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CetegoryController extends Controller
{
    public function index()
    {
        $cetegories = Cetegory::all();
        return view('dashboard.cetegory.index', compact('cetegories'));
    }
    public function store(Request $request)
    {
        $manager = new ImageManager(new Driver());
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required|image'
        ]);

        if ($request->hasfile('image')) {
            $newname = auth()->id() . '-' . Str::random(6) . '.' . $request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image->toPng()->save(base_path('public/uploads/cetegory/' . $newname));

            if ($request->slug) {
                Cetegory::insert([
                    'title' => Str::ucfirst($request->title),
                    'slug' => Str::slug($request->slug, '-'),
                    'image' => $newname,
                    'created_at' => now(),
                ]);

                return back()->with('cat_success', "Category Create Successfull");
            } else {
                Cetegory::insert([
                    'title' => Str::ucfirst($request->title),
                    'slug' => Str::slug($request->title, '-'),
                    'image' => $newname,
                    'created_at' => now(),
                ]);
                return back()->with('cat_success', "Category Create Successfull");
            }
        } else {
            return back()->withErrors(['image' => 'image field is must required!'])->withInput();
        }
    }


    //     // edit pase start here.....
    //     public function edit($slug){
    //   return view('dashboard.cetegory.edit');
    //         // $cetegory = Cetegory::where('slug',$slug)->first();

    //         // return view('dashboard.cetegory.edit',[
    //         //     'ahammad' => $cetegory,
    //         // ]);
    //     }
}
