<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Instructor;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $documentations = Post::where('post_category_id', 1)->orderBy('id', 'desc')->limit(4)->get();
        $lessons = Post::where('post_category_id', 2)->orderBy('id', 'desc')->limit(4)->get();
        $instructors = Instructor::limit(4)->get();
        return view('pages.front.home', compact('documentations', 'lessons', 'instructors'));
    }

    public function instructor(){
        $instructors = Instructor::all();
        return view('pages.front.instructor.index', compact('instructors'));
    }

    public function documentation(Request $request){

        $query = Post::where('post_category_id', 1)->orderBy('id', 'desc');

        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $documentations = $query->paginate(8); // pagination 8 item per halaman

        // Jika request AJAX, return partial view
        if ($request->ajax()) {
            return view('partials.documentation-list', compact('documentations'))->render();
        }

        return view('pages.front.post.documentation', compact('documentations'));
    }

    public function lesson(Request $request)
    {
        $query = Post::where('post_category_id', 2)->orderBy('id', 'desc');

        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $lessons = $query->paginate(8); // pagination 8 item per halaman

        // Jika request AJAX, return partial view
        if ($request->ajax()) {
            return view('partials.lesson-list', compact('lessons'))->render();
        }

        // Jika biasa, return view utama
        return view('pages.front.post.lesson', compact('lessons'));
    }



    public function detail(string $slug){
        $post = Post::where('slug', $slug)->first();
        return view('pages.front.post.detail', compact('post'));
    }
}
