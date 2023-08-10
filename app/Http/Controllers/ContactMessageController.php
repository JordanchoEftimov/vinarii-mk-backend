<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactMessageController extends Controller
{
    public function store(ContactMessageRequest $request): JsonResource
    {
        $contactMessage = ContactMessage::query()
            ->create($request->validated());

        return JsonResource::make($contactMessage);
    }
}
