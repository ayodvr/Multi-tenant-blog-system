<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tenant;

class AdminUserController extends Controller
{
    public function pending()
    {
        return response()->json(User::where('is_approved', false)->get());
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_approved' => true]);

        if (!$user->tenant) {
            Tenant::create(['user_id' => $user->id, 'name' => $user->name . "'s Blog"]);
        }

        return response()->json(['message' => 'User approved.']);
    }
}
