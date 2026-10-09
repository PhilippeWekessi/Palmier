@extends('layouts.app')

@section('title', $post->title)

@section('content')
<section class="mx-auto max-w-4xl px-4 py-12 sm:px-6 lg:px-8">
    <article class="card overflow-hidden">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="h-72 w-full object-cover sm:h-96">
        @else
            <div class="flex h-72 items-center justify-center bg-gradient-to-br from-primary-light/20 to-gold/20 text-5xl sm:h-96">🌿</div>
        @endif

        <div class="p-6 sm:p-8">
            <p class="text-sm text-gray-500">{{ $post->published_at?->locale('fr')->translatedFormat('d F Y') }}</p>
            <h1 class="mt-3 text-3xl font-bold text-primary-dark">{{ $post->title }}</h1>
            <div class="prose prose-lg mt-6 max-w-none text-gray-700">
                {!! nl2br(e($post->content)) !!}
            </div>
        </div>
    </article>

    <div class="mt-8">
        <a href="{{ route('posts.index') }}" class="btn-outline">← Retour aux conseils</a>
    </div>
</section>
@endsection
