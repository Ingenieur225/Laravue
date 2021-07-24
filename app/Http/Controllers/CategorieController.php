<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategorieController extends Controller
{
    public function index()
    {
        $cats = Category::latest()->get();
        return response()->json($cats);
    }

    public function store(Request $request)
    {
        $insert = Category::create([
            'nom' => $request->nom
        ]);
        if($insert)
            return response()->json([
                'data' => Category::latest()->get()
            ]);
        else
            return response()->json('error');
    }

    public function show($id)
    {
        $check = Category::where('id', $id)->first();
        return response()->json([
            'data' => $check
        ]);
    }

    public function edit(Request $request, $id)
    {
        $insert = Category::findOrFail($id);
        $updated = $insert->update([
            'nom' => $request->nom
        ]);
        if($updated)
            return response()->json([
                'data' => Category::latest()->get()
            ]);
        else
            return response()->json('error');
    }

    public function delete($id)
    {
        $check = Category::findOrFail($id);
        if($check) {
            $check->destroy($check->id);
            return response()->json([
                'data' => Category::latest()->get()
            ]);
        }
        else
            return response()->json('error');
    }

    public function search(Request $request)
    {
        $check = Category::where('nom', 'like', "%$request->nom%")->get();
        if($check) {
            return response()->json([
                'data' => $check
            ]);
        }
        else
            return response()->json('error');
    }
}
