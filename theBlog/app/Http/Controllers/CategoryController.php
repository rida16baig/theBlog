<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create_category()
    {
        return view('category.create');
    }
    public function store_category(Request $request)
    {
        $validateData = $request->validate([ 
            'name' => 'required|unique:categories'
        ]);

        $result = category::create($validateData);

        if ($result) {
            return redirect('/dashboard')->with('success', 'category Added Successfully');
        } else {
            return redirect('/dashboard')->with('success', 'Something went wrong');
        }
    }


    public function blog_with_category($id)
    {
        $category = Category::where('id', $id)->with('blogs')->get();
        $categories = Category::all();
        $latest = Blog::latest()->limit(2)->get();
        $catwblog = Category::with('blogs')->get();
        return view('blog_with_category', ['category' => $category, 'categories' => $categories, 'category_id' => $id, 'latest' => $latest, 'catwblog' => $catwblog]);
    }


    public function all_category()
    {
        $result = category::get();

        return view('category.all', [ 'category' => $result ]);
    }
    public function edit_category($id)
    {
        $category = Category::find($id);

        return view('category.edit', [ 'category' => $category ]);
    }
    public function update_category(Request $request, $id)
    {
        $validatedData = $request->validate([ 
            'name' => 'required|unique:categories'
        ]);

        $result = category::where('id', $id)->update($validatedData);

        if ($result) {
            return redirect('categories')->with('success', 'Category Updated Successfully');
        } else {
            return redirect('categories')->with('success', 'Something Went Wrong');
        }

    }
    public function delete_category($id)
    {
        $result = category::destroy($id);
        if ($result) {
            return redirect()->back()->with('success', 'Category Deleted Successfully');
        } else {
            return redirect()->back()->with('success', 'Something Went Wrong');
        }
    }
}