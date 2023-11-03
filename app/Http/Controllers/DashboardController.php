<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
class DashboardController extends Controller
{
    public function index()
    {

            $ideas = Idea::with('user','comments.user')->orderby('created_at', 'DESC');

            if(request()->has('search')){
            $ideas = Idea::where('content', 'like', '%'.request('search').'%');
            }
                return view('dashboard', [
                    'ideas' => $ideas ->paginate(4)
                ]);

        
    }
}
