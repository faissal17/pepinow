<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlantResource;
use App\Models\Plant;
use Illuminate\Http\Request;
use Spatie\Backtrace\File;

class PlantConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        //return $user->rolesName();
        if ($user->hasAnyRole(['admin', 'vendeur', 'user'])) { // return plant::all();
            $plant = plant::get();
            return response()->json([
                'status' => 'success',
                'result' => $plant
            ], 200);
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->hasAnyRole(['admin', 'vebdeur'])) {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'required|image',
                'category_id' => 'required|integer|max:255',
            ]);


            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/plants/', $filename);


            $plant = Plant::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $filename,
                'category_id' => $request->category_id,
            ]);
            return new PlantResource($plant);
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        $user = auth()->user();
        if ($user->hasAnyRole(['admin', 'vendeur', 'suer'])) {
            return new PlantResource($plant);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $plant)
    {

        $user = auth()->user();
        if ($user->hasAnyRole(['admin', 'vendeur'])) {

            $plant = Plant::find($plant->id);

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/plants/', $filename);

            $plant->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $filename,
                'category_id' => $request->category_id,
            ]);

            return response()->json(["message" => "success", "Plant" => $plant]);
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        // $plant = Plant::find($plant->id);

        $user = auth()->user();
        if ($user->hasAnyRole(['admin', 'vendeur'])) {
            $plant->delete();

            return response()->json(["message" => "success", "Plant" => $plant]);
        } else {
            abort(403);
        }
    }
}
