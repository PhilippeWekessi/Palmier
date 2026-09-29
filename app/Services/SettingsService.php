<?php

namespace App\Services;

use App\Models\Setting;

/**
 * Lit les paramètres du site (table `settings`) avec des valeurs par défaut.
 * Une seule requête SQL par page grâce à la mémorisation dans l'instance.
 */
class SettingsService
{
    private ?array $values = null;

    public static function defaults(): array
    {
        return [
            'company_name' => config('app.name', 'Elaeis Prestige'),
            'hero_title' => 'Des plants de palmier à huile de qualité pour une plantation durable',
            'hero_subtitle' => 'Elaeis Prestige vous accompagne dans votre projet agricole avec des plants sélectionnés et adaptés aux besoins des producteurs.',
            'phone' => config('elaeis.phone'),
            'whatsapp' => config('elaeis.whatsapp_number'),
            'email' => config('elaeis.contact_email'),
            'address' => 'Bénin',
            'opening_hours' => 'Lundi – Samedi : 8h00 – 18h00',
            'facebook_url' => null,
            'instagram_url' => null,
        ];
    }

    public function all(): array
    {
        if ($this->values === null) {
            $stored = Setting::query()
                ->pluck('value', 'key')
                ->filter(fn ($value) => $value !== null && $value !== '')
                ->all();

            $this->values = array_merge(static::defaults(), $stored);
        }

        return $this->values;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->all()[$key] ?? $default;
    }

    /** Lien WhatsApp (wa.me) ou null si aucun numéro n'est configuré. */
    public function whatsappUrl(?string $message = null): ?string
    {
        $digits = preg_replace('/\D+/', '', (string) $this->get('whatsapp'));

        if ($digits === '') {
            return null;
        }

        $url = 'https://wa.me/'.$digits;

        return $message ? $url.'?text='.rawurlencode($message) : $url;
    }

    /** Lien tel: ou null si aucun téléphone n'est configuré. */
    public function telUrl(): ?string
    {
        $phone = preg_replace('/[^\d+]/', '', (string) $this->get('phone'));

        return $phone !== '' ? 'tel:'.$phone : null;
    }
}