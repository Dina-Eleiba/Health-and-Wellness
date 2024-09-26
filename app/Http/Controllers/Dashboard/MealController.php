<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::with('category')->paginate(20);;
        return view('dashboard.meals.all-meals', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::tree()->get()->toTree();
        $weekdays = [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        ];
        return view('dashboard.meals.create-meal', compact('weekdays', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'day_of_week' => 'required|in:Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
            'is_vegetarian' => 'required|in:0,1',
            'is_daily_special' => 'required|in:0,1',
        ]);

        Meal::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'day_of_week' => $request->day_of_week,
            'is_vegetarian' => $request->is_vegetarian,
            'is_daily_special' => $request->is_daily_special,
            'category_id' => $request->category_id,
        ]);
        return redirect()->back()->with('success', 'Meal created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $meal = Meal::findOrFail($id);
        $categories = Category::tree()->get()->toTree();
        $weekdays = [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        ];
        return view('dashboard.meals.edit-meal', compact('meal', 'categories', 'weekdays'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $meal = Meal::findOrFail($id);
        $data = $request->except('_token');
        $meal->update($data);
        return redirect()->back()->with('success', 'meal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $meal = Meal::findOrFail($id);
        $meal->delete();
        return redirect()->back()->with('success', 'Meal deleted successfully');
    }
}
