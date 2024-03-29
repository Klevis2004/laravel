<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesBlog; // Import the CategoriesBlog class
use App\Models\Category; // Assuming your model is named Category
use App\Models\LibratPost;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $posts = LibratPost::all();
        $categories = Category::all();
        return view('users.contain.shop', ['posts' => $posts, 'categories' => $categories]);
    }   
    public function create()
    {
        $categories = category::all();  
        return view('admin.contain.create', ['categories' => $categories]);
    }
    
    public function store(CategoriesBlog $request)
    {
        $validated = $request->validated();

        $category = Category::create($validated);

        return redirect()->back()->with('success', 'The category was created successfully!');
    }

    public function show($id)
    {
        $posts = LibratPost::where('category_id', $id)->get();
        $categories = category::all();  
        return view('users.contain.category', ['posts' => $posts, 'categories' => $categories]);
    }

    public function destroy(string $id)
    {
        $post = Category::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'The book was deleted successfully!');
    }
}
