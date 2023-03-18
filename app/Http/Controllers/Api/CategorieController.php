<?php

namespace App\Http\Controllers\API;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategorieResource;

class CategorieController extends Controller
{
    public function index()
    {
        return Categorie::all();
        // return 1;
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

        ]);

        $Categorie = Categorie::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return new CategorieResource($Categorie);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $Categorie)
    {
        return new CategorieResource($Categorie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $Categorie)
    {
        // dd();

        $Categorie = Categorie::find($Categorie->id);

        $Categorie->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json(["message" => "success", "Categorie" => $Categorie]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $Categorie)
    {
        // $Categorie = Categorie::find($Categorie->id);

        $Categorie->delete();

        return response()->json(["message" => "success", "Categorie" => $Categorie]);
    }
}
