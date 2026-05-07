<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all()->unique('name');
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'required|image'
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')
                                 ->store('blogs', 'public');
        }

        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_description' => $request->short_description,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'published_at' => now()
        ]);

        return redirect()
                ->route('admin.blogs.index')
                ->with('success', 'Blog Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all()->unique('name');

        return view(
            'admin.blogs.edit',
            compact('blog', 'categories')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
        $request->validate([
        'title' => 'required',
        'short_description' => 'required',
        'content' => 'required',
        'category_id' => 'required'
    ]);

    $imagePath = $blog->image;

    if ($request->hasFile('image')) {

        $imagePath = $request->file('image')
                             ->store('blogs', 'public');
    }

    $blog->update([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'short_description' => $request->short_description,
        'content' => $request->content,
        'category_id' => $request->category_id,
        'image' => $imagePath
    ]);

    return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
        $blog->delete();

        return redirect()
                ->route('admin.blogs.index')
                ->with('success', 'Blog Deleted Successfully');
    }
}
