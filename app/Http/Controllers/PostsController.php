<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        return view('posts.create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StorePost $request)
    {
        //
        $validatedData = $request->validated();
        //$image = $request->image->store('postsImages');
        //var_dump($validatedData);
        
        $post = new Post();
        $created = $post->create(array_merge($validatedData, ['published_at'=>date('Y-m-d H:i:s')]));
        //$post->fill(['published_at'=>date('Y-m-d H:i:s')])->save();
        //$post->save();
        // $post->published_at = date('Y-m-d H:i:s');
        // $post->save();
        if($created){
            session()->flash('success', "Post created successfully");
            return(redirect()->route('posts.index'));
        }
        else{
            return(redirect()->route('posts.create'));
        }
        
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
        $post = Post::withTrashed()->where('id', $id)->first();
        if($post->trashed()){
            $post->forceDelete();
            
            session()->flash('success', 'Post deleted successfully');
            return(redirect()->route('trashedPosts'));
        }
        else{
            $post->delete();
            
            session()->flash('success', 'Post deleted successfully');
            return(redirect()->route('posts.index'));
        }
        // $post->delete();
        
    }
    
    /**
    * List soft deleted posts
    * @return \illuminate\http\Response
    */
    public function indexTrashed(){
        $posts = Post::onlyTrashed()->get();
        return view('posts.index')->with('posts', $posts);
        
    }
}
