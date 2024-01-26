<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsBlog;
use App\Models\LibratPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogContoller extends Controller
{

    public function index()
    {
        $posts = LibratPost::all();
        return view('users.contain.welcome', ['posts' => $posts]);
    }
    
    public function create()
    {
        return view('users.contain.register');
    }
    public function store(PostsBlog $request)
    {
        $validated = $request->validated();
    
        $post = new LibratPost();
        $post->name = $validated['name'];
        $post->author = $validated['author'];
        $post->photo = $validated['photo'];
        $post->save();
    
        $request->session()->flash('status', 'The book was published succefully!');
        return redirect('/book/' . $post->id);
    }
    
    public function show($id)
    {
        $post = DB::table('librat_posts')->where('id', $id)->first();
        return view('users.contain.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
