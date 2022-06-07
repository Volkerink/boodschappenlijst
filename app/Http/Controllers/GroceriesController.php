<?php

namespace App\Http\Controllers;

use App\Models\Grocery;
use Illuminate\Http\Request;

class GroceriesController extends Controller
{       

    public function index() {
    $groceryDB = Grocery::all(); 

        return view('groceries.index', compact('groceryDB'));

    }

    
    public function create() {
        return view('groceries.create');

    }


    public function store() {
        $userInput = request()->validate([
            'NAME' => 'required',
            'NUMBER' => 'required',
            'price' => 'required'
        ]);

        Grocery::create($userInput);
        return redirect()->route('groceries');

    }


    public function edit(Request $request) {
        $groceryDB = Grocery::all(); 
        $activeRow = $groceryDB[$request->keys()[1] - 1];
        return view('groceries.edit', compact('activeRow'));

    }


    public function update(Grocery $grocery) {
        $userInput = request()->validate([
            'NAME' => 'required',
            'NUMBER' => 'required',
            'price' => 'required'
        ]);

        $grocery->fill($userInput);
        $grocery->save();

        return redirect()->route('groceries');
    }


    public function destroy(Request $request) {
        Grocery::destroy($request->keys()[1]);
        return redirect()->route('groceries');
    }
}
