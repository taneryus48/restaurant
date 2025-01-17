<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::with('category')->paginate(10);
        return view('admin.menu-items.index', compact('menuItems'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.menu-items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('menu-images', 'public');
            $validated['image'] = $path;
        }

        MenuItem::create($validated);

        return redirect()->route('menu-items.index')
                         ->with('success', 'Menü öğesi oluşturuldu.');
    }

    public function edit(MenuItem $menuItem)
    {
        $categories = Category::all();
        return view('admin.menu-items.edit', compact('menuItem', 'categories'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Eski resmi silmek için
            if ($menuItem->image) {
                Storage::disk('public')->delete($menuItem->image);
            }
            $path = $request->file('image')->store('menu-images', 'public');
            $validated['image'] = $path;
        }

        $menuItem->update($validated);

        return redirect()->route('menu-items.index')
                         ->with('success', 'Menü öğesi güncellendi.');
    }

    public function destroy(MenuItem $menuItem)
    {
        if ($menuItem->image) {
            Storage::disk('public')->delete($menuItem->image);
        }
        $menuItem->delete();
        return redirect()->route('menu-items.index')
                         ->with('success', 'Menü öğesi silindi.');
    }

}
namespace App\Http\Controllers;

use App\Models\Category;

class MenuController extends Contrfoller
{
    public function index()
    {
        $categories = Category::with(['products' => function ($query) {
            $query->where('status', 'yayında'); // Sadece yayında olan ürünleri getir
        }])->get();

        return view('menu', compact('categories'));
    }
}
