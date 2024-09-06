<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Services\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Category::whereNotNull('parent_id')->with('parent')->get();
        return view('dashboard.subcategories.all-subcategories', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::tree()->get()->toTree();
        return view('dashboard.subcategories.create-subcategory', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|string',
                'description' => 'nullable|string',
                'parent_id' => 'required|integer',
                'status' => 'required',
            ]
        );
        $data = $request->except('_token', 'image');
        $data['slug'] = Str::slug($request->name, '_');
        if ($request->file('image')) {
            $image = Media::UploadMedia($request->file('image'), 'subcategories');
            $data['image'] = $image;
        }
        Category::create($data);
        return redirect()->back()->with('success', 'Subcategory created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::tree()->get()->toTree();
        $subcategory = Category::findOrFail($id);
        return view('dashboard.subcategories.edit-subcategory', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subcategory = Category::findOrFail($id);
        $data = $request->validate(
            [
                'name' => 'required|string',
                'description' => 'nullable|string',
                'category_id' => 'required|integer',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required',
            ]
        );
        $data['slug'] = Str::slug($request->name, '_');
        if ($request->file('image'))
        {
            $NewImageName = Media::UploadMedia($request->file('image'), 'subcategories');
            $data['image'] = $NewImageName;
            Media::deleteMedia($subcategory->image, 'subcategories');
        };
        $subcategory->update($data);
        return redirect()->back()->with('success', 'Subategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = Category::findOrFail($id);
        $subcategory->delete();
        return redirect()->back()->with('success', 'Subcategory deleted successfully');
    }
}
