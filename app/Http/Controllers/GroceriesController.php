<?php

namespace App\Http\Controllers;

use App\Models\Grocery;
use App\Models\Category;
use Illuminate\Http\Request;

class GroceriesController extends Controller
{   
    public function validateInput()    {
        return request()->validate([
            'name' => 'required|string|min:2',
            'category_id' => 'required|integer|min:1',
            'number' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0'
        ]);
    }

    public function index() {
        $groceryDB = Grocery::all();
        $totalPrice = 0;
        foreach ($groceryDB as $value) {
            $totalPrice += ($value["price"] * $value["number"]);
        }
        $finalPrice = array(0 => number_format($totalPrice, 2, ',', ' '));
        return view('groceries.index', compact('groceryDB', 'finalPrice'));
    }

    
    public function create() {
        $categoryDB = Category::all();
        return view('groceries.create', compact('categoryDB'));
    }


    public function store() {
        Grocery::create($this->validateInput());
        return redirect()->route('groceries');
    }


    public function edit(Request $request) {
        $categoryDB = Category::all();
        $activeRow = Grocery::where('id',$request->grocery_id)->with('category')->first();
        return view('groceries.edit', compact('activeRow', 'categoryDB'));
    }


    public function update(Grocery $grocery) {
        $grocery->fill($this->validateInput());
        $grocery->save();
        return redirect()->route('groceries');
    }


    public function destroy(Request $request) {
        Grocery::destroy($request->grocery_id);
        return redirect()->route('groceries');
    }
}
