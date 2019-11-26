<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        //
        $tags = Tag::all();
        return view('tags.index')->with('tags', $tags);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        return view('tags.create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validated();
        $tag = new Tag();
        $created = $tag->create($validatedData);
        $name = $created->name;
        if($created){
            session()->flash('success', "Tag {$name} created");
            return(redirect()->route('tags.index'));
        }
        else{
            return(redirect()->route('tags.create'));
        }
        //
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Tag  $tag
    * @return \Illuminate\Http\Response
    */
    public function show(Tag $tag)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Tag  $tag
    * @return \Illuminate\Http\Response
    */
    public function edit(Tag $tag)
    {
        //
        $tag = Tag::find($id);
        return view('tags.edit')->with('tag', $tag);//
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Tag  $tag
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Tag $tag)
    {
        //
        $validatedData = $request->validated();
        $tag = Tag::find($id);
        $updated = $tag->update($validatedData);
        
        if($updated){
            session()->flash('success', 'updated successfully');
            return(redirect()->route('tags.index'));
        }
        else{
            return(redirect()->route('tags.edit'));
        }   //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Tag  $tag
    * @return \Illuminate\Http\Response
    */
    public function destroy(Tag $tag)
    {
              //
        $tag = Tag::find($id);
        $tag->delete();
        session()->flash('success', 'Tag deleted successfully');
        return(redirect()->route('tags.index'));
          //
    }
}