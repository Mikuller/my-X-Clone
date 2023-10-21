<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);

        return view('user.show', compact('user','ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editting = true;
        return view('user.show', compact('user','editting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        //
    }














    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
