<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Yeni bir ürün oluşturma işlemi.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
            'is_popular' => 'sometimes|boolean',
        ]);

        $validated['is_popular'] = $request->has('is_popular');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products');
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Ürün başarıyla oluşturuldu!');
    }

    /**
     * Mevcut bir ürünü güncelleme işlemi.
     */
    
    public function update(Request $request, Product $product)
    {dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'nullable|integer',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|max:2048',
            'is_popular' => 'sometimes|boolean', // is_popular alanını doğrula
        ]);
    
        $validated['is_popular'] = $request->has('is_popular'); // Checkbox işaretliyse true, değilse false döner
    
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }
    
        $product->update($validated);
    
        return redirect()->route('products.edit', $product)->with('success', 'Ürün başarıyla güncellendi!');
    }
    }
