<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminInventoryController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        $lowStockProducts = Product::where('quantity', '<', 10)->get();
        return view('admin.inventory.index', compact('products', 'lowStockProducts'));
    }

    public function updateStock(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:0',
        ]);

        $product->update($request->only('quantity'));

        return redirect()->route('admin.inventory.index')->with('success', 'Inventory updated successfully.');
    }
}
