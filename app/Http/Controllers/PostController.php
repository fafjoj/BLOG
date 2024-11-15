<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    //
    public function index(){
        $postsFromDB = Post::all();
        return view('posts.index', ['posts' => $postsFromDB]);
    }
//convention over configration
    public function show(Post $post){
        return view('posts.show', ['post' => $post]);
    }

    public function create(){
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store(){

        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'postCreator' => ['required', 'exists:users,id']
        ]);

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;

        //store in database
        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator
        ]);

        return to_route('posts.index');
    }

    public function edit(Post $post){
        $users = User::all();
        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }
    //update

    public function update(Post $post){
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'postCreator' => ['required', 'exists:users,id']
        ]);

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;

        $post->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator
        ]);

        return to_route('posts.show',$post);
    }

    public function destroy(Post $post){
        //Post::where('id','postid)->delete()
        $post->delete();
        return to_route('posts.index');
    }
}
