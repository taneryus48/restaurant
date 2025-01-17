<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->input('category_id'));
        }

        $products = $query->paginate(10);
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
            'is_popular' => 'sometimes|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['is_popular'] = $request->has('is_popular');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Ürün başarıyla oluşturuldu.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'nullable|integer',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|max:2048',
            'is_popular' => 'sometimes|boolean',
        ]);

        $validated['is_popular'] = $request->has('is_popular');

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.edit', $product)->with('success', 'Ürün başarıyla güncellendi!');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Ürün başarıyla silindi.');
    }

    public function removeImage(Product $product)
    {
        if ($product->image) {
            Storage::delete('public/' . $product->image);
            $product->update(['image' => null]);
        }

        return redirect()->route('products.edit', $product)->with('success', 'Ürün görseli başarıyla silindi.');
    }

    public function dashboard()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();

        return view('admin.dashboard', compact('products', 'categories'));
    }
}
