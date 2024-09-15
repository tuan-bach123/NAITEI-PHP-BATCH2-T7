<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $categories = ProductCategory::withCount('products')->get();
        $query = Product::with('category', 'userReviews')
            ->withCount('userReviews')
            //->orderByDesc(['trendRating'])
            ->paginate(20);

        // Apply category filters if selected
        if ($request->has('categories') && is_array($request->input('categories'))) {
            $query->whereIn('product_category_id', $request->input('categories'));
        }

        $sort = $request->input('sort');
        switch ($sort) {
            case 'az':
                $query->orderBy('name', 'asc');
                break;
            case 'za':
                $query->orderBy('name', 'desc');
                break;
            case 'low-high':
                $query->orderBy('price', 'asc');
                break;
            case 'high-low':
                $query->orderBy('price', 'desc');
                break;
            case 'rating-low-high':
                $query->orderBy('user_reviews_avg_rating', 'asc');
                break;
            case 'rating-high-low':
                $query->orderBy('user_reviews_avg_rating', 'desc');
                break;
        }

        $trendingProducts = Product::with('userReviews')
            ->withAvg('userReviews', 'rating')
            ->withCount('userReviews')
            ->orderByDesc('user_reviews_avg_rating')
            ->take(6)  // Limit to 6 trending products
            ->get();
        $search = $request->input('search');

        // Filter by category
        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        // Fetch the filtered or unfiltered products
        $products = $query->paginate(20);
        return view('home', [
            'user' => Auth::user(),
            'products' => $products,
            'trendingProducts' => $trendingProducts,
            'categories' => $categories,
        ]);
    }
}
