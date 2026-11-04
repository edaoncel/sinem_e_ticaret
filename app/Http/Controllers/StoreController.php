<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('sku', 'like', '%' . $searchTerm . '%');
            });
        }

        $selectedCategory = null;

        if ($request->has('category') && $request->category != '') {
            // Slug değerine göre seçilen kategoriyi buluyoruz
            $selectedCategory = Category::with('products')->where('slug', $request->category)->first();

            if ($selectedCategory) {
                // Sadece bu kategoriye ait ürünleri filtrele
                $query->where('category_id', $selectedCategory->id);
            }
        }

        $products = $query->latest()->paginate(18)->fragment('urunler');
        $productsCount = Product::count();
        
        $categories = Category::with('products')->get();
        
        // Menüde gösterilecek kategoriler (Footer ve Blade için)
        $menuCategories = Category::where('show_in_menu', true)->get();
        
        // Özel menü kategorilerinin slug listesi (Ürün kartlarını parlatmak için)
        $menuCategorySlugs = $menuCategories->pluck('slug')->toArray();
        
        $bestSellers = Product::with('category')->where('is_best_seller', true)->latest()->take(7)->get();

        $discountedProducts = Product::with('category')->whereNotNull('discount_price')->where('discount_price', '>', 0)->latest()->take(6)->get();

        return view('store.index', compact(
            'products', 
            'categories', 
            'bestSellers', 
            'discountedProducts', 
            'productsCount', 
            'selectedCategory', 
            'menuCategories',      // Footer için çoğul isimle düzeltildi
            'menuCategorySlugs'    // Ürün kartı stilleri için eklendi
        ));
    }
}