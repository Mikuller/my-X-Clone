<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
class DashboardController extends Controller
{
    public function index()
    {

        $ideas = Idea::orderby('created_at', 'DESC');

        if(request()->has('search')){
         $ideas = Idea::where('content', 'like', '%'.request('search').'%');
        }
            return view('dashboard', [
                'ideas' => $ideas ->paginate(4)
            ]);

        
    }
}
