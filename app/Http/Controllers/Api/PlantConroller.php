<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlantResource;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Plant::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        // return $request;
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|max:1024',
            'categorie_id' => 'required|integer|max:255',
            'vendeur_id' => 'required|integer|max:255',

        ]);


        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('uploads/plants/', $filename);


        // return response()->json(["message" => $request->file('image')]);
        $plant = Plant::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename,
            'categorie_id' => $request->categorie_id,
            'vendeur_id' => $request->vendeur_id,
        ]);

        return new PlantResource($plant);
    }

    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        return new PlantResource($plant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $plant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        //
    }
}
