<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
       
        $ideas = $user->ideas()->paginate(5);

        return view('user.edit', compact('user', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validated = request()->validate(
            [
                'name'=>'required|max:40|min:2',
                'bio'=>'nullable|max:500',
                'image'=>'image',
            ]
            );
 
            if(request()->has('image')){

                $imagePath = request()->file('image')->store('profiles', 'public');
                $validated['image'] = $imagePath;
                
                Storage::disk('public')->delete($user->image);
            }



        $user->update($validated);

        return redirect()->route('user.show', $user->id)->with('success', "profile updated successfully");


        }

}
