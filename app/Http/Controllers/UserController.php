<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function getUserRole($id)
    {
        $user = User::find($id);

        if ($user) {
            // Object is not null, access properties safely
            $role = $user->role;
            return $role;
        } else {
            // Object is null, handle the case
            // For example, display an error message or redirect
            return "User not found.";
        }
    }
}
