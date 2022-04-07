<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('admin');

        $users = User::all()->map(function ($user) {
            return [
                'name' => $user->name,
                'email' => $user->email,
                'permissions' => collect($user->permissions)->map(fn($p) => ' ' . ucfirst($p)),
            ];
        });

        return Inertia::render('Dashboard/Users/Index', [
            'users' => $users,
        ]);
    }
}
