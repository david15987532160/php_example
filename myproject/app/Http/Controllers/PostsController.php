<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('tags')->latest()->paginate(5);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', [
            'tags' => Tag::all()->pluck('name'),
        ]);
    }

    /**
     * Store a newly created resource in storage.x
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     * ``@throws ValidationException
     */
    public function store(Request $request)
    {
        Post::create($this->validate($request, [
            'title' => 'required',
            'body' => 'required|max:255',
            'mail' => 'me' . rand(100, 999) . '@gmail.com',
            'tags' => 'exists:tags,id'
        ]))
            ->tags()
            ->attach($request->input('tags'));

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     **
     * @param Post $post
     * @return Factory|View
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Factory|View
     */
    public function edit(Post $post)
    {

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, Post $post)
    {
        $post->update($this->validate($request, [
            'title' => 'required',
            'body' => 'required|max:255',
            'updated_at' => Carbon::now(),
        ]));

        return redirect('/posts/' . $post->id)->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('success', 'Post Deleted');
    }

    /**
     * Get posts of specific Tag
     * @param Tag $tagId
     * @return Factory|View
     */
    public function getPostsByTag(Tag $tagId)
    {
        if (!empty($tagId)) {
            return view('tags.show_post', [
                'posts' => $tagId->posts,
            ]);
        }
    }

    /**
     * Get posts of specific Category
     * @param Category $categoryId
     * @return Factory|View
     */
    public function getPostsByCategory(Category $categoryId)
    {
        if (!empty($categoryId)) {
            return view('categories.show_post', [
                'posts' => $categoryId->posts,
            ]);
        }
    }
}
