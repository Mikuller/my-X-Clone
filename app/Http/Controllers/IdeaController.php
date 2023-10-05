<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){

        $validated= request()->validate(
            [
                'content' =>'required|max:100|min:2'
            ]
            );
           

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', "Idea Created Successfully");
    }

    public function delete(Idea $id){
    $id->delete();

     return redirect()->route('dashboard')-> with('success', "Idea deleted Successfully");
    }

     public function show(Idea $idea){

       
        return view('ideas.show', compact('idea'));
     }

     public function edit(Idea $idea){
        $editIdea = true;
        return view('ideas.show', compact('idea','editIdea'));
     }

     public function update(Idea $idea){

        $validated=request()->validate(
            [
                'content' =>'required|max:100|min:2'
            ]
            );

         $idea->update($validated);

        return redirect()->route('idea.show', $idea)->with('success', "Idea updated successfully");
    }
}
