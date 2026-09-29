<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\User;

class AddressPolicy
{
    public function before(User $user, string $ability): ?bool
    {
        return $user->isAdmin() ? true : null;
    }

    public function view(User $user, Address $address): bool
    {
        return (int) $address->user_id === (int) $user->id;
    }

    public function update(User $user, Address $address): bool
    {
        return (int) $address->user_id === (int) $user->id;
    }

    public function delete(User $user, Address $address): bool
    {
        return (int) $address->user_id === (int) $user->id;
    }
}