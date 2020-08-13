<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Post;
use App\User;

class PostController extends Controller
{
    //


    public function index(){
        
        $posts = Post::all();
        //$posts = auth()->user()->posts;
       // dd($posts);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function show(Post $post){
        

        return view('blog-post', ['post'=>$post]);
    }

    public function create(){
        

        return view('admin.posts.create');
    }

    public function store(){
        
        $inputs = request()->validate([

            'title' => 'required|min:12',
            'post_image' => 'file',
            'body' => 'required|min:30'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        Session::flash('post-created-message','post added');

        return redirect()->route('post.index');
//        return view('admin.posts.create');
    }

    public function edit(Post $post){
     //  $this->authorize('view', $post);

        if(auth()->user()->can('view', $post)){
            
        }

        return view('admin.posts.edit', ['post'=>$post]);
    }

    public function destroy(Post $post){
        
        $post->delete();

        Session::flash('message','post deleted');

        return back();
    }

    public function update(Post $post){
        $inputs = request()->validate([

            'title' => 'required|min:12',
            'post_image' => 'file',
            'body' => 'required|min:30'
        ]);


        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $this->authorize('update', $post);
        //auth()->user()->posts()->save($post); // owner change
        $post->save(); // no owner change

        Session::flash('post-updated-message','post updated');

        return redirect()->route('post.index');
        

    }
}
