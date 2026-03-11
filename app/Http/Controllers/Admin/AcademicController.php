<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Academic;
use App\Models\Instructor;
use App\Models\AcademicCategory;

use App\Http\Requests\AcademicRequest;
use App\Http\Requests\UpdateAcademicRequest;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academics = Academic::with('academicCategory', 'instructor')->get();
        $instructors = Instructor::all();
        $categories = AcademicCategory::all();

        return view('pages.academic.index', compact('academics', 'instructors', 'categories'));
    }

    public function getOneData(Request $request)
    {
        $request->validate([
            'query' => 'required|integer',
        ]);

        $query = $request->get('query');

        $academic = Academic::where('id', $query)->first();

        return response()->json($academic);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AcademicRequest $request)
    {
        try {

            $validated = $request->validated();

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('academic', 'public');
            }

            $slug = Str::of($validated['title'])->slug('-');

            DB::transaction(function () use ($validated, $slug) {
                Academic::create([
                    ...$validated,
                    'slug' => $slug,
                ]);
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
    public function update(UpdateAcademicRequest $request, string $id)
    {
        try {
            $academic = Academic::findOrFail($id);

            $validated = $request->validated();

        
            if ($request->hasFile('image')) {
                if($academic->image && Storage::disk('public')->exists($academic->image)) {
                    Storage::disk('public')->delete($academic->image);
                }

                $validated['image'] = $request->file('image')->store('academic', 'public');
            }
            
            $slug = Str::of($validated['title'] ?? $article->title)->slug('-');

            DB::transaction(function () use ($validated, $id, $slug) {
                Academic::where('id', $id)->update([
                    ...$validated,
                    'slug' => $slug,
                ]);
            });

            return response()->json(['message' => 'Success'], 201);

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
            Academic::where('id', $id)->delete();
        });

        return response()->json(['message' => 'Success'], 201);
    }
}
