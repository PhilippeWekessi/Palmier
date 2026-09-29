<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\Review;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Produits disponibles en premier, puis les plus récents.
        $products = Product::active()
            ->orderByRaw('stock > 0 desc')
            ->latest('id')
            ->take(8)
            ->get();

        // Uniquement les avis approuvés (avec eager loading de l'auteur : pas de N+1).
        $reviews = Review::approved()
            ->with('user:id,name')
            ->whereNotNull('comment')
            ->latest()
            ->take(3)
            ->get();

        $posts = Post::published()
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.home', compact('products', 'reviews', 'posts'));
    }
}