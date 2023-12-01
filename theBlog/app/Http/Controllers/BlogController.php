<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function home()
    {
        $blogs = Blog::all();
        $category = category::get();
        $catwblog = category::with('blogs')->get();
        $latest = Blog::latest()->limit(2)->get();

        return view('home', [ 'blogs' => $blogs, 'category' => $category, 'latest' => $latest, 'catwblog' => $catwblog ]);
    }

    // public function all_blog_posts()
    // {
    //     $blogs = Blog::all();
    //     return view('admin.blogs.all', ['blogs' => $blogs]);
    // }

    
    public function blog($id)
    {
        $blog = Blog::where('id', $id)->get();
        return view('blogs.blog', [ 'blog' => $blog, 'category' => category::get()]);
    }
    public function all_blog()
    {
        $blog = Blog::all();
        return view('admin.all', [ 'blog' => $blog ]);
    }
    public function dashboard()
    {
        return view('admin.show');
    }
    public function create_blog()
    {
        return view('admin.create', [ 'categories' => category::get()]);
    }


    public function create_blog_post(Request $request)
    {
        $request->validate([ 
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'category_id' => 'required|exists:categories,id',
        ]);

        $img = $request->file('image');

        if (!$img) {
            return redirect()->back()->with('error', 'Image not provided');
        }

        $image_name = $img->getClientOriginalName();
        $img->storeAs('public/', $image_name);

        $result = Blog::create([ 
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'),
            'body' => $request->input('body'),
            'image' => $image_name,
            'category_id' => $request->input('category_id'),
        ]);



        if ($result) {
            return redirect('/')->with('success', 'Blog Created Successfully');
        }
    }

    public function edit_blog($id)
    {
        $blog = Blog::find($id);
        return view('admin.edit', ['blog' => $blog]);
    }

    public function edit_blog_post(Request $request, $id)
    {
        $image = Blog::where('id', $id)->select('image')->get();

        $image = $image[0]->image;

        $validated_data = $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $image = $request->file('image');

        if ($image) {
            $result = Storage::delete('public/' . $image);
            if ($result) {
                $image_name = $this->uploadImage($image);

                $result = Blog::where('id', $id)->update([
                    'title' => $request->input('title'),
                    'excerpt' => $request->input('excerpt'),
                    'body' => $request->input('body'),
                    'image' => $image_name,
                ]);

                if ($result) {
                    return redirect('/blogs')->with('success', 'blog updated successfully');
                }
            }
        } else {
            $result = Blog::where('id', $id)->update($validated_data);
            if ($result) {
                return redirect('/blogs')->with('success', 'blog updated successfully');
            }
        }
    }

    public function delete_blog_post($id)
    {
       
        $blog = Blog::find($id);

        $thumbnail = $blog->image;

        $result = Storage::delete('public/' . $thumbnail);
        if ($result) {
            $result = Blog::destroy($id);
            if ($result) {
                return redirect('/blogs')->with('success', 'blog deleted successfully');
            }
        }
    }
    

    public function uploadImage($image)
    {
        $image_name =  Str::random(20) . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public', $image_name);
        return $image_name;
    }

}