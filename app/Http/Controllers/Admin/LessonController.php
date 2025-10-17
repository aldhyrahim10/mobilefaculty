<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Post::where('post_category_id', 2)->get();

        return view('pages.lesson.index', compact('lessons'));
    }

    public function getOneData(Request $request)
    {
        $request->validate([
            'query' => 'required|integer',
        ]);

        $query = $request->get('query');

        $lesson = Post::where('id', $query)->first();

        return response()->json($lesson);
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
    public function store(PostRequest $request)
    {
        try {

            $validated = $request->validated();

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('lesson', 'public');
            }

            $slug = Str::of($validated['title'])->slug('-');

            DB::transaction(function () use ($validated, $slug) {
                Post::create([
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
    public function update(UpdatePostRequest $request, string $id)
    {
        try {
            $lesson = Post::findOrFail($id);

            $validated = $request->validated();

        
            if ($request->hasFile('image')) {
                if($lesson->image && Storage::disk('public')->exists($lesson->image)) {
                    Storage::disk('public')->delete($lesson->image);
                }

                $validated['image'] = $request->file('image')->store('lesson', 'public');
            }
            
            $slug = Str::of($validated['title'] ?? $article->title)->slug('-');

            DB::transaction(function () use ($validated, $id, $slug) {
                Post::where('id', $id)->update([
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
            Post::where('id', $id)->delete();
        });

        return response()->json(['message' => 'Success'], 201);
    }
}
