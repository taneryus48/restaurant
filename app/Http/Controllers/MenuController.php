<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Tüm menü sayfasını gösterir.
     */
    public function index()
    {
        // Kategoriler ve ürünler
        $categories = Category::with(['products' => function ($query) {
            $query->where('status', 'published');
        }])->get();
    
        // "Tümü" butonuna tıklanmışsa popüler ürünleri dahil etmiyoruz
        $popularProducts = collect(); // Popüler ürünler boş olmalı, "Tümü" sayfasında listelememek için
    
        return view('menu', compact('categories', 'popularProducts'));
    }
    
    /**
     * Popüler ürünlerin gösterimi için.
     */
    public function popular()
    {
        // Sadece popüler ve 'published' durumdaki ürünleri al
        $popularProducts = Product::where('is_popular', true)
            ->where('status', 'published')
            ->get();

        // Tüm kategorileri de al, gerekirse view'de göstermek için
        $categories = Category::all();
        // 'menu' view'ine popularProducts ve categories değişkenlerini aktar
        return view('menu', compact('popularProducts', 'categories'));
    }

    /**
     * Belirli bir kategoriye göre ürünleri filtreler.
     */
    public function filterByCategory($id)
    {
        $categories = Category::all();
        $filteredCategory = Category::with(['products' => function ($query) {
            $query->where('status', 'published');
        }])->findOrFail($id);
    
        // Popüler ürünlerin bu metodda yer almasına gerek var mı?
        $popularProducts = Product::where('is_popular', true)
            ->where('status', 'published')
            ->get();
    
        // Eğer popüler ürünler ve filtrelenmiş kategori ürünleri çakışıyorsa,
        // sadece $filteredCategory'yi kullanın ve $popularProducts'ı tamamen çıkarın.
    
        return view('menu', compact('categories', 'filteredCategory'));
    }
    }
