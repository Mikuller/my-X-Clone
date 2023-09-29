<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){

        request()->validate(
            [
                'idea' =>'required|max:100|min:2'
            ]
            );
        $idea = new Idea([
            'content' => request()->get('idea','')
        ]);

        $idea->save();

        return redirect()->route('dashboard')->with('success', "Idea Created Successfully");
    }

    public function delete($id){

    Idea::where('id', $id)->firstorfail()->delete();

     return redirect()->route('dashboard')-> with('success', "Idea deleted Successfully");
    }
}
