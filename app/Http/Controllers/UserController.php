<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=user::simplePaginate(4);
     return view("index" ,compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "number" => "required",
            'profile' => 'required',
        ]);

        if ($request->file('profile')) {
            $fileName = time() . '_' . $request->file('profile')->getClientOriginalName();
            $request->file('profile')->move(public_path('profiles'), $fileName);

            user::create([
                "name" => $request->name,
                "email" => $request->email,
                "number" => $request->number,
                "profile" => $fileName,
            ]);
        }
        return redirect()->route("user.index")->with('success', 'Student added successfully!');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=user::find($id);
        return view('edit' ,compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=user::find($id);
        if ($request->hasFile('profile')) {
            if ($user->profile && \Storage::exists('profiles/' . $user->profile)) {
                \Storage::delete('profiles/' . $user->profile);
            }


            $fileName = time() . '_' . $request->file('profile')->getClientOriginalName();
            $request->file('profile')->move(public_path('profiles'), $fileName);
        }
        $user->update(array_merge($request->all(),['profile'=>$fileName ?? $user->profile]));
        return redirect()->route("user.index")->with('success', 'Student edit successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=user::find($id);
        $user->delete();
        return redirect()->route("user.index")->with('success', 'Student Delete successfully!');

    }
}
