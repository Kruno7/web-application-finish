<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cities.index')->with('cities', City::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities|min:3|max:255',
            'zip_code' => 'integer|digits:5',
        ]);

        City::create($request->all());
        return redirect()->route('admin.city.index')->with('success', 'Uspješno ste dodali novi grad!');
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
        return view('admin.cities.edit')->with('city', City::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'zip_code' => 'integer|digits:5',
        ]);
        City::find($id)->update($request->all());
        return redirect()->route('admin.city.index')->with('success', 'Uspješno ste ažurirali grad!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::find($id);
        $city->delete();
        return redirect()->route('admin.city.index')->with('success', 'Uspješno ste izbrisali grad!');
    }

    function searchCities(Request $request) {
        $cities = City::where('name','LIKE','%'.$request->name."%")->get();

        return response()->json([
            'cities' => $cities
        ]);
        
    }

}
