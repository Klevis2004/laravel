<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsBlog;
use App\Models\category;
use App\Models\LibratPost;
use App\Models\Sales;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Li;

class BlogContoller extends Controller
{

    public function index()
    {
        $users = User::all();
        $posts = LibratPost::all();
        $categories = category::all();
        return view('users.contain.welcome', ['posts' => $posts, 'categories' => $categories, 'users' => $users]);
    }

    public function kreu()
    {
        return view('admin.contain.index');
    }
    public function create()
    {
        $categories = category::all();
        return view('admin.contain.register', ['categories' => $categories]);
    }
    public function store(PostsBlog $request)
    {

        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath;
        }

        $post = LibratPost::create($validated);

        return redirect('/book/' . $post->id)->with('success', 'The book was published succefully!');
    }

    public function show($id)
    {
        $categories = category::all();
        $post = DB::table('librat_posts')->where('id', $id)->first();

        $currentDate = Carbon::now();
        $sale = Sales::where('book_id', $id)
        ->whereDate('data_dorezimit', '>=', $currentDate)
        ->min('data_dorezimit');

        return view('users.contain.show', ['post' => $post, 'categories' => $categories, 'sale' => $sale]);
    }


    public function edit(string $id)
    {
        $categories = category::all();
        $post = LibratPost::findOrFail($id);
        return view('admin.contain.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update(PostsBlog $request, string $id)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath;
        }

        $post = LibratPost::findOrFail($id);
        $post->fill($validated);
        $post->save();

        return redirect('/book/' . $post->id)->with('success', 'The book was updated successfully!');
    }

    public function destroy(string $id)
    {
        $post = LibratPost::findOrFail($id);
        $post->delete();

        return redirect('/')->with('success', 'The book was deleted successfully!');
    }
}
