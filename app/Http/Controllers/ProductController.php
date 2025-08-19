<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();

        return view('pages.products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated_data = $request->validate([
            'name' => 'required|string|max:30',
            'category_id' => 'required',
            'description' => 'required|string|max:100',
            'qrcode' => 'required|string|unique:products',
            // 'price' => 'nullable|integer'
        ]);

        try {
    
            Product::create($validated_data);
            ToastMagic::success('Product registered');
    
            return back();
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), [
                'code' => $th->getCode()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated_data = $request->validate([
            'name' => 'string|max:30',
            'category_id' => 'required',
            'description' => 'string|max:100',
            'qrcode' => 'string',
            'price' => 'integer'
        ]);

        try {
    
            // Product::create($validated_data);
            $update = $product->update($validated_data);

            if (!$update) {
               ToastMagic::error('update failed');
               return back(); 
            }

            ToastMagic::success('Product updated');
            return back();
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), [
                'code' => $th->getCode()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $deleted = $product->delete();

            if (!$deleted) {
                ToastMagic::error('deletion failed');
                return back();
            }

            ToastMagic::success('Product deleted');
            return back();
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), [
                'code' => $th->getCode()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }
    }
}
