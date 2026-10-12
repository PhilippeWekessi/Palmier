@extends('layouts.admin')

@section('title', 'Tableau de bord')
@section('page_title', 'Tableau de bord administrateur')

@section('content')
    <div class="card p-6">
        <h2 class="text-xl font-bold text-primary-dark">Bienvenue, {{ auth()->user()->name }} 👋</h2>
        <p class="mt-2 text-sm text-gray-600">Vous êtes connecté sur l'espace d'administration sécurisé d'Elaeis Prestige.</p>
        
        <div class="mt-6 rounded-xl bg-primary/5 p-4 ring-1 ring-primary/10">
            <p class="text-sm text-primary font-medium">
                Le tableau de bord complet avec métriques, graphiques et indicateurs de performance sera enrichi en Phase 11.
            </p>
        </div>
    </div>
@endsection