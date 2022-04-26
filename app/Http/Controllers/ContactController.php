<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ContactController extends Controller
{
    public function index(User $user): AnonymousResourceCollection
    {
        return ContactResource::collection($user->contacts);
    }

    public function store(User $user, ContactRequest $request): ContactResource
    {
        $contact = $user->contacts()->create($request->validated());

        return new ContactResource($contact);
    }

    public function show(User $user, $contact_id): ContactResource
    {
        $contact = $user->contacts()->findOrFail($contact_id);
        return new ContactResource($contact);
    }

    public function update(ContactRequest $request, User $user, $contact_id): ContactResource
    {
        $contact = $user->contacts()->findOrFail($contact_id);
        $contact->update($request->validated());
        return new ContactResource($contact);
    }

    public function destroy(User $user, $contact_id): ContactResource
    {
        $contact = $user->contacts()->findOrFail($contact_id);
        $contact->delete();
        return new ContactResource($contact);
    }

}
