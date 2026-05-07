<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::latest()->paginate(6);

        $categories = Category::all()->unique('name');

        return view(
            'frontend.index',
            compact('blogs', 'categories')
        );
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        return view('frontend.show', compact('blog'));
    }
    public function filter(Request $request)
    {
        $blogs = Blog::query();
        
        if ($request->search) {
        
            $blogs->where('title',
                'like',
                '%' . $request->search . '%'
            );
        }
    
        if ($request->category) {
            $categoryName = Category::find($request->category)->name ?? '';
            if ($categoryName) {
                $categoryIds = Category::where('name', $categoryName)->pluck('id');
                $blogs->whereIn('category_id', $categoryIds);
            }
        }
        
        if ($request->date) {
            $blogs->whereDate('published_at', $request->date);
        }
    
        if ($request->sort == 'oldest') {
        
            $blogs->oldest();
        
        } else {
        
            $blogs->latest();
        }
    
        $blogs = $blogs->paginate(6);
        $blogs->appends($request->all());
    
        return view(
            'frontend.partials.blog-list',
            compact('blogs')
        )->render();
    }
}
