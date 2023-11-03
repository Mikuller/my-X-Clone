<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       
        
            $followings = auth()->user()->followings()->pluck('user_id');
    
    
            
    
            $ideas = Idea::whereIn('user_id', $followings)->with('user','comments.user')->latest();
    
            if(request()->has('search')){
             $ideas = Idea::where('content', 'like', '%'.request('search').'%');
            }
                return view('dashboard', [
                    'ideas' => $ideas ->paginate(4)
                ]);   
        
    }
}
