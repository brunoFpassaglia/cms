<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        return view('categories.create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreCategory $request)
    {
        //
        $validatedData = $request->validated();
        $category = new Category();
        $created = $category->create($validatedData);
        $name = $created->name;
        if($created){
            session()->flash('success', "Category {$name} created");
            return(redirect()->route('categories.index'));
        }
        else{
            return(redirect()->route('categories.create'));
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
        $category = Category::find($id);
        return view('categories.edit')->with('category', $category);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(StoreCategory $request, $id)
    {
        //
        $validatedData = $request->validated();
        $category = Category::find($id);
        $updated = $category->update($validatedData);
        
        if($updated){
            session()->flash('success', 'updated successfully');
            return(redirect()->route('categories.index'));
        }
        else{
            return(redirect()->route('categories.edit'));
        }
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
        $category = Category::find($id);
        if($category->posts()->count() > 0){
            session()->flash('warnings', 'There are posts created for this category. Aborting delete.');
            return redirect()->back();
        }
        else{
            $category->delete();
            session()->flash('success', 'Category deleted successfully');
            return(redirect()->route('categories.index'));
        }
    }
}
