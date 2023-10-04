<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){

        request()->validate(
            [
                'content' =>'required|max:100|min:2'
            ]
            );
        $idea = new Idea([
            'content' => request()->get('content','')
        ]);

        $idea->save();

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

        request()->validate(
            [
                'content' =>'required|max:100|min:2'
            ]
            );

         $idea->content = request('content',"");
         $idea -> save();

        return redirect()->route('idea.show', $idea)->with('success', "Idea updated successfully");
    }
}
