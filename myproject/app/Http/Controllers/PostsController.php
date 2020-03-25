<?php

namespace App\Http\Controllers;

use App\Category;
use App\Models\CategoryPost;
use App\Models\PostTag;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        $tags = [];

        foreach ($posts as $post) {
            array_push($tags, $post->tags);
        }

        return view('posts.index', [
            'posts' => $posts,
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.x
     *
     * @param \Illuminate\Http\Request $request
     ** @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required|max:255'
        ]);

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->users = 'me';
        $post->mail = $post->users . rand(100, 999) . '@gmail.com';

        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     ** @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     ** @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     ** @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required|max:255'
        ]);

        // Edit Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->updated_at = Carbon::now();

        $post->save();

        return redirect('/posts')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     ** @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post Deleted');
    }

    /**
     * Get posts of specific Tag
     * @param int $id
     */
    public function getPostsByTag($id)
    {
        $verifiedId = Tag::where('id', $id)->firstOrFail();
        if (!empty($id) && $verifiedId) {
            $postIDs = PostTag::where('tag_id', $id)->pluck('post_id');
            $posts = Post::whereIn('id', $postIDs)->get();

            return view('tags.show_post', [
                'posts' => $posts
            ]);
        }
    }

    /**
     * Get posts of specific Category
     * @param int $id
     */
    public function getPostsByCategory($id)
    {
        $verifiedId = Category::where('id', $id)->firstOrFail();
        if (!empty($id) && $verifiedId) {
            $postIDs = CategoryPost::where('category_id', $id)->pluck('post_id');
            $posts = Post::whereIn('id', $postIDs)->get();

            return view('categories.show_post', [
                'posts' => $posts
            ]);
        }
    }
}
