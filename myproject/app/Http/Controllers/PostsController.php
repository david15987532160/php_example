<?php

namespace App\Http\Controllers;

use App\Models\PostTag;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = DB::select(SELECT * FROM ('posts'));
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $array_tag = [];
        $tags = [];

        foreach ($posts as $post) {
            array_push($array_tag, $this->getTagsByPost($post->id));
        }
        foreach ($array_tag as $array) {
            array_push($tags, $array);
        }

        return view('posts.index', ['posts' => $posts, 'tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.x
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required|max:100'
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

//        return view('posts.show', compact('post'));
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required|max:100'
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post Deleted');
    }

    /**
     * Get tags of specified post
     */
    public function getTagsByPost($id)
    {
        if (!empty($id)) {
            $tagIDs = PostTag::where('post_id', $id)->pluck('tag_id');
            $tags = Tag::whereIn('id', $tagIDs)->get();
        } else {
            $posts = Post::all();
            $tags = [];
            foreach ($posts as $post) {
                $tagIds = PostTag::where('post_id', $post->id)->pluck('tag_id');
                array_push($tags, Tag::whereIn('id', $tagIds)->get());
            }
        }

        return $tags;
    }

    /**
     * Get posts of specified tag
     */
    public function getPostsByTag($id)
    {
        if (!empty($id)) {
            $postIDs = PostTag::where('tag_id', $id)->pluck('post_id');
            $posts = Post::whereIn('id', $postIDs)->get();
        } else {
            $tags = Tag::all();
            $posts = [];
            foreach ($tags as $tag) {
                $postIDs = PostTag::where('tag_id', $tag->id)->pluck('post_id');
                array_push($posts, Post::whereIn('id', $postIDs)->get());
            }
        }

        return view('tags.show-post', ['posts' => $posts]);
    }
}
