<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

/**
 * Genere automatiquement un slug unique a partir d'un champ source
 * (par defaut 'name') lors de la creation, si le slug n'est pas deja renseigne.
 *
 * Le modele qui utilise ce trait peut definir la constante SLUG_SOURCE
 * pour choisir le champ source (ex: 'title' pour Post).
 */
trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $source = defined(static::class.'::SLUG_SOURCE')
                    ? static::SLUG_SOURCE
                    : 'name';

                $model->slug = static::generateUniqueSlug($model->{$source});
            }
        });
    }

    public static function generateUniqueSlug(string $value): string
    {
        $base = Str::slug($value);
        $slug = $base;
        $i = 1;

        while (static::withTrashedIfApplicable()->where('slug', $slug)->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }

    protected static function withTrashedIfApplicable()
    {
        return method_exists(static::class, 'withTrashed')
            ? static::withTrashed()
            : static::query();
    }
}
