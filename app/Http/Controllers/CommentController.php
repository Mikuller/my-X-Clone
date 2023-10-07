<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Idea;
class CommentController extends Controller
{

    public function store(Idea $idea){

       request()->validate(
          [
            'content'=>'required'
          ]
          );

          $comment = new Comment([
            'content'=> request('content'),
            'idea_id'=> $idea->id,
            'user_id'=> auth()->id()
          ]);


          $comment->save();       

          return redirect()->route('idea.show', $idea->id)->with('success', "Commented successfully");

    }
    //
}
