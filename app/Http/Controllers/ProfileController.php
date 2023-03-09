<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Profiles.index', ['user' => Auth::user()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {
        $user = User::find(Auth()->user()->id);
        $user->update($request->validated());

        return response()->json('Modification enregister !', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $user = User::find(Auth::user()->id);
        $user->delete();
    }
}
