<?php

namespace App\Http\Controllers;

use App\Exceptions\UserPermissionException;
use App\Http\Requests\ProfileUpdate;
use App\Http\Resources\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return new User($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdate $request)
    {
        $user = Auth::user();
        if ($request->has('name')) {
            $user->name = $request->input('name');
            $user->save();
        }

        return new User($user);
    }
}
