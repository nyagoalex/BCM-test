<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        $users = User::query()->paginate(10);
        return UserResource::collection($users);
    }

    public function store(UserRequest $request): UserResource
    {
        $user = User::create($request->validated());
        return new UserResource($user);
    }

    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user): UserResource
    {
        $user->update($request->validated());
        return new UserResource($user);
    }

    public function destroy(User $user): UserResource
    {
        $user->delete();
        return new UserResource($user);
    }

    public function block(User $user): UserResource
    {
        $user->update(['is_blocked' => true]);
        return new UserResource($user);
    }

    public function unblock(User $user): UserResource
    {
        $user->update(['is_blocked' => false]);
        return new UserResource($user);
    }
}
