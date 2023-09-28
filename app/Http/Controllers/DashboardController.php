<?php
;
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Idea;
class DashboardController extends Controller
{
    public function index(){
        
        $idea = new Idea(
            [
                'content' => "Test Testtata umta huletaa",
                'likes' => 200,
            ]
            );

        $idea->save();

        return view('index', [
            'ideas' => Idea::all()
        ]);
    }
}
