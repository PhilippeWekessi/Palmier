<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    // L'administrateur peut tout faire ; pour les autres, on applique les règles ci-dessous.
    public function before(User $user, string $ability): ?bool
    {
        return $user->isAdmin() ? true : null;
    }

    public function viewAny(User $user): bool
    {
        return true; // le contrôleur ne listera que SES commandes
    }

    public function view(User $user, Order $order): bool
    {
        return (int) $order->user_id === (int) $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Order $order): bool
    {
        return false; // réservé à l'administrateur
    }

    public function delete(User $user, Order $order): bool
    {
        return false; // réservé à l'administrateur
    }
}