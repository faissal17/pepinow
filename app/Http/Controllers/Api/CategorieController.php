<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Spatie\Permission\Models\Role;

class CategorieController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        //return $user->rolesName();
        if ($user->hasAnyRole(['admin', 'vendeur', 'user'])) { // return category::all();
            // get all Category and songs associated with to each category
            $Category = Category::with('plants')->get();
            return response()->json([
                'status' => 'success',
                'result' => $Category
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
        if ($user->hasAnyRole(['admin'])) {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'vendeur_id' => 'required|integer',

            ]);

            $Category = Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'vendeur_id' => $request->vendeur_id,
            ]);

            return new CategoryResource($Category);
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $Category)
    {
        $user = auth()->user();
        if ($user->hasAnyRole(['admin', 'vendeur', 'user'])) {
            return new CategoryResource($Category);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $Category)
    {
        // dd();

        $Category = Category::find($Category->id);

        $user = auth()->user();
        if ($user->hasAnyRole(['admin'])) {

            $Category->update([
                'name' => $request->name,
                'description' => $request->description,
                'vendeur_id' => $request->vendeur_id,
            ]);

            return response()->json(["message" => "success", "Category" => $Category]);
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $Category)
    {
        // $Category = Category::find($Category->id);

        $user = auth()->user();
        if ($user->hasAnyRole(['admin'])) {
            $Category->delete();
            return response()->json(["message" => "success", "Category" => $Category]);
        } else {
            abort(403);
        }
    }
}
