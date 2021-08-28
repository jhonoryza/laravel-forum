<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mews\Purifier\Facades\Purifier;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::orderBy('updated_at', 'Desc')->paginate(5);
        view()->share(compact('threads'));

        $categories = Category::get();
        $tags = Tag::get();
        view()->share(compact(['categories', 'tags']));

        return view('pages.threads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $tags = Tag::get();
        view()->share(compact(['categories', 'tags']));
        return view('pages.threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:60',
            'body' => 'required|min:5|max:600',
            'tags' => 'required|array',
            'tags.*' => 'required',
            'category' => 'required'
        ]);

        DB::transaction(function () use ($request) {
            $thread = Thread::create([
                'title' => $request->title,
                'slug' => \Str::slug($request->title),
                'body' => Purifier::clean($request->body),
                'category_id' => $request->category,
                'author_id' => auth()->user()->id
            ]);
            $thread->syncTags($request->tags);
        });

        return redirect()->route('threads.index')->with('success', 'thread created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Thread $thread)
    {
        view()->share(compact(['thread', 'category']));
        return view('pages.threads.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
