<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function modify(User $user, Post $post): Response
    {
        return $user->tenant->id === $post->tenant_id 
        ? Response::allow() 
        : Response::deny('This post does not belong to you.');
    }
}
