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
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'permissions' => $user->permissions,
            ];
        });

        return Inertia::render('Dashboard/Users/Index', [
            'users' => $users,
        ]);
    }

    public function save(Request $request)
    {
        $this->authorize('admin');

        $user = User::find($request->id);

        if ($user === null) {
            $user = new User;
            $user->password = '';
        }

        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'permissions' => $request->permissions,
        ]);

        $user->save();

        $users = User::all()->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'permissions' => $user->permissions,
            ];
        });

        return Inertia::render('Dashboard/Users/Index', [
            'users' => $users,
        ]);
    }
}
