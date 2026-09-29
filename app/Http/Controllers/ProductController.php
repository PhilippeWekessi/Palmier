<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::query()->active()->with('category');

        if ($search = trim((string) $request->query('q', ''))) {
            $query->where(function ($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%")
                    ->orWhere('reference', 'like', "%{$search}%")
                    ->orWhere('variety', 'like', "%{$search}%");
            });
        }

        if ($categorySlug = $request->query('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $categorySlug));
        }

        if ($variety = $request->query('variety')) {
            $query->where('variety', $variety);
        }

        if ($request->query('availability') === 'in_stock') {
            $query->inStock();
        }

        if ($request->filled('price_min')) {
            $query->where('price', '>=', (float) $request->query('price_min'));
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', (float) $request->query('price_max'));
        }

        match ($request->query('sort')) {
            'price_asc' => $query->orderBy('price'),
            'price_desc' => $query->orderByDesc('price'),
            'newest' => $query->latest('id'),
            default => $query->orderByRaw('stock > 0 desc')->latest('id'),
        };

        $products = $query->paginate(8)->withQueryString();

        $categories = Category::active()->orderBy('name')->get(['id', 'name', 'slug']);

        $varieties = Product::query()
            ->active()
            ->whereNotNull('variety')
            ->distinct()
            ->orderBy('variety')
            ->pluck('variety');

        return view('pages.products.index', compact('products', 'categories', 'varieties'));
    }

    public function show(Product $product): View
    {
        abort_unless($product->is_active, 404);

        $product->load(['images', 'category']);

        $related = Product::query()
            ->active()
            ->where('id', '!=', $product->id)
            ->when($product->category_id, fn ($q) => $q->where('category_id', $product->category_id))
            ->inStock()
            ->take(4)
            ->get();

        return view('pages.products.show', compact('product', 'related'));
    }
}