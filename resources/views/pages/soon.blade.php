@extends('layouts.app')

@section('title', $title)

@section('content')
    <section class="mx-auto flex max-w-3xl flex-col items-center px-4 py-24 text-center">
        <h1 class="mt-6 text-3xl font-bold text-primary-dark">{{ $title }}</h1>
        <p class="mt-3 text-gray-600">Cette page est en cours de construction et sera bientôt disponible.</p>
        <a href="{{ route('home') }}" class="btn-primary mt-8">Retour à l'accueil</a>
    </section>
@endsection