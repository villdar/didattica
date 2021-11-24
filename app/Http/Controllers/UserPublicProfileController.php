<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPublicProfileController extends Controller
{
    public function show(User $user)
    {
        return view('user.public-profile', [
            'user' => $user
        ]);
    }
}
