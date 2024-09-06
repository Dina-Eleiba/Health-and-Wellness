<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Services\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('dashboard.brands.all-brands', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.brands.create-brand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate(
            [
                'name' => 'required|string',
                'logo' => 'required',
                'status' => 'required',
            ]
        );
        $data['slug'] = Str::slug($request->name, '_');
        if ($request->file('logo')) {
            $image = Media::UploadMedia($request->file('logo'), 'brands');
            $data['logo'] = $image;
        }
        Brand::create($data);
        return redirect()->back()->with('success', 'Brand created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('dashboard.brands.edit-brand', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Brand = Brand::findOrFail($id);
        $data = $request->validate(
            [
                'name' => 'required|string',
                'status' => 'required',
            ]
        );
        $data['slug'] = Str::slug($request->name, '_');
        if ($request->file('logo'))
        {
            $NewImageName = Media::UploadMedia($request->file('logo'), 'brands');
            $data['logo'] = $NewImageName;
            Media::deleteMedia($Brand->logo, 'brands');
        };
        $Brand->update($data);
        return redirect()->back()->with('success', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Brand = Brand::findOrFail($id);
        Media::deleteMedia($Brand->logo, 'brands');
        $Brand->delete();
        return redirect()->back()->with('success', 'Brand deleted successfully');
    }
}
