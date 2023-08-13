<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\User;
use App\Models\Winery;

class WineryPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Winery $winery): bool
    {
        return $user->role === UserRole::WINERY && $user->winery()->id === $winery->id;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Winery $winery): bool
    {
        return $user->role === UserRole::WINERY && $user->winery()->id === $winery->id;
    }

    public function delete(User $user): bool
    {
        return false;
    }

    public function deleteAny(User $user): bool
    {
        return false;
    }

    public function restore(User $user): bool
    {
        return false;
    }

    public function forceDelete(User $user): bool
    {
        return false;
    }
}
