<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Http\Requests\RestaurantStoreRequest;
use App\Http\Requests\RestaurantUpdateRequest;
use Illuminate\Validation\Rule;

class RestoController extends Controller
{
    public function index()
    {
        return view("home");
    }

    public function list()
    {
        $data = Restaurant::all();
        $data = Restaurant::paginate(3);
        return view('list', ["data" => $data]);

        // return view('list', ["data" => $data]);
    }

    // public function add(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:restaurants',
    //         'address' => 'nullable|string|max:255',
    //     ]);

    //     Restaurant::create($validatedData);

    //     return redirect('list')->with('success', 'Restaurant added successfully.');
    // }
    public function add(RestaurantStoreRequest $request)
    {
        Restaurant::create($request->validated());

        return redirect('list')->with('success', 'Restaurant added successfully.');
    }

    public function delete(Request $request, $id)
    {
        Restaurant::findOrFail($id)->delete();
        $request->session()->flash('success', 'Restaurant has been deleted successfully.');
        return redirect('list');
    }

    public function edit($id)
    {
        $data = Restaurant::findOrFail($id);
        return view('edit', ["data" => $data]);
    }

    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => [
    //             'required',
    //             'string',
    //             'email',
    //             'max:255',
    //             Rule::unique('restaurants')->ignore($id),
    //         ],
    //         'address' => 'nullable|string|max:255',
    //     ]);

    //     $restaurant = Restaurant::findOrFail($id);
    //     $restaurant->update($validatedData);

    //     return redirect('list')->with('success', 'Restaurant updated successfully.');
    // }
    public function update(RestaurantUpdateRequest $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($request->validated());

        return redirect('list')->with('success', 'Restaurant updated successfully.');
    }

    public function deleteAll(Request $request)
    {
        $request->validate([
            'selected' => 'required|array',
            'selected.*' => 'integer|exists:restaurants,id',
        ]);

        Restaurant::destroy($request->input('selected'));

        return redirect('list')->with('success', 'Selected records deleted successfully.');
    }
}
