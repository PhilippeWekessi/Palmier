@extends('layouts.app')

@section('title', 'Conseils agricoles')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-primary">Conseils</p>
        <h1 class="mt-3 text-3xl font-bold text-primary-dark">Conseils agricoles</h1>
    </div>

    @if ($posts->isEmpty())
        <div class="card p-10 text-center text-gray-600">Aucun article publié pour le moment.</div>
    @else
        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($posts as $post)
                <article class="card overflow-hidden">
                    <a href="{{ route('posts.show', $post) }}" class="block aspect-[16/9] overflow-hidden bg-primary/5">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="h-full w-full object-cover hover:scale-105 transition duration-300">
                        @else
                            <div class="flex h-full items-center justify-center bg-gradient-to-br from-primary-light/20 to-gold/20 text-4xl">🌿</div>
                        @endif
                    </a>
                    <div class="p-5">
                        <p class="text-xs text-gray-500">{{ $post->published_at?->locale('fr')->translatedFormat('d F Y') }}</p>
                        <h2 class="mt-2 text-xl font-semibold text-gray-900">
                            <a href="{{ route('posts.show', $post) }}" class="hover:text-primary">{{ $post->title }}</a>
                        </h2>
                        <p class="mt-3 text-sm leading-relaxed text-gray-600">{{ 
                            Illuminate\Support\Str::limit(strip_tags($post->content), 140) }}</p>
                        <a href="{{ route('posts.show', $post) }}" class="mt-4 inline-block text-sm font-medium text-primary hover:underline">Lire l'article →</a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    @endif
</section>
@endsection
