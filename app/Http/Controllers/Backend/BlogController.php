<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(20);
        return view('backend.pages.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('backend.pages.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg,webp',
            'banner' => 'image|mimes:png,jpg,jpeg,webp',
        ]);
        $slug = Str::slug($request->title);
        $thumbnail = $slug . '-' . uniqid() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
        $thumbnail_path = "Uploads/Blog/Thumbnail/" . $thumbnail;
        $request->file('thumbnail')->move(public_path('Uploads/Blog/Thumbnail'), $thumbnail);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->sub_title = $request->title;
        $blog->description = $request->description;
        $blog->thumbnail = $thumbnail_path;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->meta_description = $request->meta_description;
        if ($blog->save()) {
            if ($request->hasFile('banner')) {
                $banner = $slug . '-' . uniqid() . '.' . $request->file('banner')->getClientOriginalExtension();
                $banner_path = "Uploads/Blog/Banner/" . $banner;
                $request->file('banner')->move(public_path('Uploads/Blog/Banner'), $banner);
                $blog->update(['banner' => $banner_path]);
            }
            return redirect()->route('blog.index')->with('success', 'Blog Created Successfully.');
        } else {
            return back()->with('error', 'Please Try Again!!!');
        }
    }

    public function edit(Blog $blog)
    {
        return view('backend.pages.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        //   return  $request->toArray();
        $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'description' => 'required',
            'thumbnail' => 'image|mimes:png,jpg,jpeg,webp',
            'banner' => 'image|mimes:png,jpg,jpeg,webp',
        ]);
        $slug = Str::slug($request->title);
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->sub_title = $request->sub_title;
        $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->meta_description = $request->meta_description;
        if ($request->hasFile('thumbnail')) {
            if ($blog->thumbnail) {
                File::delete(public_path($blog->thumbnail));
            }
            $thumbnail = $slug . '-' . uniqid() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $thumbnail_path = "Uploads/Blog/Thumbnail/" . $thumbnail;
            $request->file('thumbnail')->move(public_path('Uploads/Blog/Thumbnail'), $thumbnail);
            $blog->thumbnail = $thumbnail_path;
        }
        if ($request->hasFile('banner')) {
            if ($blog->banner) {
                File::delete(public_path($blog->banner));
            }
            $banner = $slug . '-' . uniqid() . '.' . $request->file('banner')->getClientOriginalExtension();
            $banner_path = "Uploads/Blog/Banner/" . $banner;
            $request->file('banner')->move(public_path('Uploads/Blog/Banner'), $banner);
            $blog->banner = $banner_path;
        }
        $blog->save();
        return redirect()->route('blog.index')->with('success', 'Blog Updated Successfully.');
    }
    public function destroy(Blog $blog)
    {
        if($blog->thumbnail){
            File::delete(public_path($blog->thumbnail));
        }
        if($blog->banner){
            File::delete(public_path($blog->banner));
        }
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Blog Deleted Successfully.');
    }
}
