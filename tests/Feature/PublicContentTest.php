<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_submits_and_persists_message(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Jean Dupont',
            'email' => 'jean@example.com',
            'phone' => '+229 97 00 00 00',
            'subject' => 'Demande de renseignement',
            'message' => 'Bonjour, je souhaite avoir plus d’informations sur vos plants.',
        ]);

        $response->assertRedirect(route('contact'));
        $this->assertDatabaseHas('contact_messages', [
            'email' => 'jean@example.com',
            'subject' => 'Demande de renseignement',
        ]);
    }

    public function test_blog_list_shows_published_posts(): void
    {
        Post::factory()->create([
            'title' => 'Comment choisir ses plants de palmier à huile',
            'slug' => 'comment-choisir-ses-plants-de-palmier-a-huile',
            'status' => Post::STATUS_PUBLISHED,
            'published_at' => now(),
        ]);

        $response = $this->get(route('posts.index'));

        $response->assertOk();
        $response->assertSee('Comment choisir ses plants de palmier à huile');
    }

    public function test_blog_detail_displays_selected_article(): void
    {
        $post = Post::factory()->create([
            'title' => 'Les premières étapes après la plantation',
            'slug' => 'les-premieres-etapes-apres-la-plantation',
            'status' => Post::STATUS_PUBLISHED,
            'published_at' => now(),
        ]);

        $response = $this->get(route('posts.show', $post));

        $response->assertOk();
        $response->assertSee('Les premières étapes après la plantation');
    }
}
