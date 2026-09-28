<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Protege toutes les routes /admin/*.
 * Un client (role = 'client') ne doit jamais pouvoir accéder au dashboard admin.
 */
class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || ! $request->user()->isAdmin()) {
            abort(403, 'Acces reserve a l\'administration.');
        }

        return $next($request);
    }
}
