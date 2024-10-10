<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Cetegory;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

Use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(2);
        return view('dashboard.blog.index',compact('blogs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_blog()
    {
        $cetegories = cetegory::where('status', 'active')->latest()->get();
        return view('dashboard.blog.create', compact('cetegories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request) {
      $request->validate([
    "category_id" => 'required', // Correct the typo here
    "title" => 'required',
    "thumbnail" => 'required',
    "short_description" => 'required',
    "description" => 'required',
]);

        if ($request->hasFile('thumbnail')) {
            $manager = new ImageManager(new Driver());
            $newname = Auth::user()->id . '-' . Str::random(4) . "." . $request->file('thumbnail')->getClientOriginalExtension();
            $image = $manager->read($request->file('thumbnail'));
            $image->toPng()->save(base_path('public/uploads/blog/' . $newname));

            if ($request->slug) {
                Blog::create([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "slug" => Str::slug($request->title, '-'),
                    "thumbnail" => $newname,
                    "short_description" => $request->short_description,
                    "description" => $request->description,
                    'created_at' => now(),
                ]);
                return redirect()->route('blog_create')->with('password_update', 'Blog Insert Successfull');
            } else {
                Blog::create([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "slug" => Str::slug($request->title, '-'),
                    "thumbnail" => $newname,
                    "short_description" => $request->short_description,
                    "description" => $request->description,
                    'created_at' => now(),
                ]);
              return redirect()->route('blog_create')->with('password_update', 'Blog Insert Successfull');

            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_blog(blog $blog)
    {

        $cetegories = Cetegory::where('status','active')->latest()->get();
        return view('dashboard.blog.edit',compact('blog','cetegories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateblogRequest $request, blog $blog)
    {
        $blogs = Blog::latest()->get();
        $request->validate([
            "category_id" => 'required',
            "title" => 'required',
            "short_description" => 'required',
            "description" => 'required',
        ]);

        if($request->hasFile('thumbnail')){
            $manager = new ImageManager(new Driver());
            $newname = Auth::user()->id.'-'.Str::random(4) .".".$request->file('thumbnail')->getClientOriginalExtension();
            $image = $manager->read($request->file('thumbnail'));
            $image->toPng()->save(base_path('public/uploads/blog/'.$newname));

            if($request->slug){
                Blog::find($blog->id)->update([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "slug" => Str::slug($request->slug,'-'),
                    "thumbnail" => $newname,
                    "short_description" => $request->short_description,
                    "description" => $request->description,
                    'updated_at' => now(),
                ]);
                return redirect()->route('blog.index')->with('success','Blog UPDATE Successfull');
            }else{
                Blog::find($blog->id)->update([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "slug" => Str::slug($request->title,'-'),
                    "thumbnail" => $newname,
                    "short_description" => $request->short_description,
                    "description" => $request->description,
                    'updated_at' => now(),
                ]);
                return redirect()->route('blog.index')->with('success','Blog UPDATE Successfull');
            }

        }else{

            if($request->slug){
                Blog::find($blog->id)->update([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "slug" => Str::slug($request->slug,'-'),
                    "short_description" => $request->short_description,
                    "description" => $request->description,
                    'updated_at' => now(),
                ]);
                return redirect()->route('blog.index')->with('success','Blog UPDATE Successfull');
            }else{
                Blog::find($blog->id)->update([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "slug" => Str::slug($request->title,'-'),
                    "short_description" => $request->short_description,
                    "description" => $request->description,
                    'updated_at' => now(),
                ]);
                return redirect()->route('blog.index')->with('success','Blog UPDATE Successfull');
            }

        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blog $blog)
    {
        //
    }
}
