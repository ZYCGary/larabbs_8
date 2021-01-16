<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UsersController extends Controller
{
    public function show(User $user, Request $request): UserResource
    {
        return new UserResource($user);
    }

    public function me(Request $request): UserResource
    {
        return (new UserResource($request->user()))->showSensitiveFields();
    }

    public function update(UserRequest $request): UserResource
    {
        $user = $request->user();

        $attributes = $request->only(['name', 'email', 'introduction']);

        if ($request->avatar_image_id) {
            $image = Image::find($request->avatar_image_id);

            $attributes['avatar'] = $image->path;
        }

        $user->update($attributes);

        return (new UserResource($user))->showSensitiveFields();
    }

    public function activedIndex(User $user): AnonymousResourceCollection
    {
        UserResource::wrap('data');
        return UserResource::collection($user->getActiveUsers());
    }
}
