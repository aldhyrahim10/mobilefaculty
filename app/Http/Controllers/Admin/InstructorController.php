<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Instructor;

use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $instructors = Instructor::all();

        return view('pages.instructor.index', compact('instructors'));
    }

    public function getOneData(Request $request)
    {
        $request->validate([
            'query' => 'required|integer',
        ]);

        $query = $request->get('query');

        $instructor = Instructor::where('id', $query)->first();

        return response()->json($instructor);
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
    public function store(InstructorRequest $request)
    {
        try {

            $validated = $request->validated();

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('instructor', 'public');
            }

            DB::transaction(function () use ($validated) {
                Instructor::create($validated);
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
    public function update(UpdateInstructorRequest $request, string $id)
    {
    
        try {
            $instructor = Instructor::findOrFail($id);

            $validated = $request->validated();

        
            if ($request->hasFile('image')) {
                if($instructor->image && Storage::disk('public')->exists($instructor->image)) {
                    Storage::disk('public')->delete($instructor->image);
                }

                $validated['image'] = $request->file('image')->store('instructor', 'public');
            }

            DB::transaction(function () use ($validated, $id) {
                Instructor::where("id", $id)->update($validated);
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
            Instructor::where('id', $id)->delete();
        });

        return response()->json(['message' => 'Success'], 201);
    }
}
