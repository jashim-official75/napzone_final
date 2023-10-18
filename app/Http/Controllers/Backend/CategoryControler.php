<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Support;
use Illuminate\Http\Request;

class CategoryControler extends Controller
{
    public function index()
    {
        $notification = Support::where('contacted', 0)->orderByDesc('created_at')->take(3)->get();
        $allCategories = Category::all();
        return view('backend.pages.category.category', compact('allCategories', 'notification'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);

        if (Category::create($request->all())) {
            return back();
        }

        return redirect()->back()->withInput();
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}
