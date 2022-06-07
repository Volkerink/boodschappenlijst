<?php

namespace App\Http\Controllers;

use App\Models\Grocery;
use Illuminate\Http\Request;

class GroceriesController extends Controller
{   
    public function validateInput()    {
    return request()->validate([
        'name' => 'required|string|min:2',
        'category' => 'required|string|min:2',
        'number' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0'
    ]);
    }

    public function groceryDB() {
        return Grocery::all(); 
    }

    public function index() {
    $groceryDB = $this->groceryDB();
    $totalPrice = 0;
    foreach ($groceryDB as $value) {
        $totalPrice += ($value["price"] * $value["number"]);
    }
        $finalPrice = array(0 => number_format($totalPrice, 2, ',', ' '));
        return view('groceries.index', compact('groceryDB', 'finalPrice'));
    }

    
    public function create() {
        return view('groceries.create');
    }


    public function store() {
        Grocery::create($this->validateInput());
        return redirect()->route('groceries');
    }


    public function edit(Request $request) {
        //$groceryDB = Grocery::all(); 
        $activeRow = $this->groceryDB()[$request->keys()[1] - 1];
        return view('groceries.edit', compact('activeRow'));
    }


    public function update(Grocery $grocery) {
        $grocery->fill($this->validateInput());
        $grocery->save();
        return redirect()->route('groceries');
    }


    public function destroy(Request $request) {
        Grocery::destroy($request->keys()[1]);
        return redirect()->route('groceries');
    }
}
