<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\StoreProductRequest;
use App\Http\Requests\dashboard\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('dashboard.products.all-products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::tree()->get()->toTree();
        $brands = Brand::all();
        return view('dashboard.products.create-product', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->except('image', '_token');
        $data['slug'] = Str::slug($request->name, '_');
        if($request->file('image')) {
            $data['image'] = Media::UploadMedia($request->file('image'), 'products');
        }
        Product::create($data);
        return redirect()->back()->with('success', 'Product created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::tree()->get()->toTree();
        $brands = Brand::all();
        return view('dashboard.products.edit-product', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->except('_token', 'image');
        $data['slug'] = Str::slug($request->name, '_');
        if($request->file('image')) {
            $data['image'] = Media::UploadMedia($request->file('image'), 'products');
            Media::deleteMedia($product->image, 'products');
        }
        $product->update($data);
        return redirect()->back()->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        Media::deleteMedia($product->image, 'products');
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

}
