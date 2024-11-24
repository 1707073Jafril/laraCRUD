<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'name' => 'required',
          'description' => 'required',
          'image' => 'nullable|mimes:jpeg,jpg,png',
       ]);

       //Upload Image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        //ADD NEW POST
        $post = new Post;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->save();

        return redirect()->route('home')->with('success', 'Created Successfully');

    }


    public function editData($id){
        $post = Post::findOrFail($id);
        //dd($id);
        return view('edit',['ourPost' => $post]);
    }

    public function updateData($id, Request $request){
        //dd($id);
        $post = Post::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required',
           'description' => 'required',
           'image' => 'nullable|mimes:jpeg,jpg,png',
        ]);
 
        //Upload Image
         $imageName = time().'.'.$request->image->extension();
         $request->image->move(public_path('images'), $imageName);
 
         //ADD NEW POST
         $post->name = $request->name;
         $post->description = $request->description;
         $post->image = $imageName;
         $post->save();
 
         return redirect()->route('home')->with('success', 'Updated Successfully');
 
    }
    public function deleteData($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('home')->with('success', 'Deleted Successfully');
    }
}
