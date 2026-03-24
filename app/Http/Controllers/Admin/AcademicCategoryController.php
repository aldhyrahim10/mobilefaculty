<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\AcademicCategory;
use App\Http\Requests\AcademicCategoryRequest;



class AcademicCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = AcademicCategory::all();

        return view('pages.academic-category.index', compact('categories'));
    }

    public function getOneData(Request $request)
    {
        $request->validate([
            'query' => 'required|integer',
        ]);

        $query = $request->get('query');

        $category = AcademicCategory::where('id', $query)->first();

        return response()->json($category);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AcademicCategoryRequest $request)
    {
        try {

            $validated = $request->validated();

            DB::transaction(function () use ($validated) {
                AcademicCategory::create($validated);
            });

           return response()->json(['message' => 'Success'], 201);

        } catch (\Exception $th) {

            return response()->json(['message' => $th->getMessage()], 500);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AcademicCategoryRequest $request, string $id)
    {
        try {

            $validated = $request->validated();

            DB::transaction(function () use ($validated, $id) {

                $category = AcademicCategory::findOrFail($id);

                $category->update($validated);

            });

            return response()->json(['message' => 'Success'], 200);

        } catch (\Throwable $th) {

            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::transaction(function() use ($id) {
            AcademicCategory::where('id', $id)->delete();
        });

        return response()->json(['message' => 'Success'], 201);
    }
}
