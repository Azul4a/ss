<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        /*
        $category = Category::find(1);
        $posts = $category->posts;
        $post = Post::find(2);
        $tag = Tag::find(2);
        dump($tag->posts);
        dump($post->tags);
        */
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return(view('post.create', compact('categories', 'tags')));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'string',
            'likes' => 'integer',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }

    public function store() {

        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'string',
            'likes' => 'integer',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags);

        // foreach ($tags as $tag) {
        //     PostTag::firstOrCreate([
        //         'tag_id' => $tag,
        //         'post_id' => $post->id,
        //     ]);
        // }
        return redirect()->route('post.index');

    }

    public function show(Post $post) {
        // $post = Post::findOrFail($id);
        // dd($post->title);
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact(['post', 'categories', 'tags']));
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function delete()
    {
        $post = Post::withTrashed()->find(4);
        $post->restore();
        dd('deleted');
    }

    //firstOrCreate
        // esli naidet to 4to napisano v pervom massive, to vozvrawaet pervyi post tak kak napisano "first",
        // esli ne naidet to sozdaet novyi post s zna4eniem na vtorom massive
    //updateOrCreate

    public function firstOrCreate()
    {
        $anotherPost = [
            'title' => 'some dbhzsdhsvsasf',
            'content' => 'some fdsfds fsdfdsf sdfsd',
            'image' => 'some imagesbbdaslbdl.jpg',
            'likes' => 43400,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate(
            [
                'title' => 'some dbhzsdhsvsasf',
            ],
            [
                'title' => 'some dbhzsdhsvsasf',
                'content' => 'some fdsfds fsdfdsf sdfsd',
                'image' => 'some imagesbbdaslbdl.jpg',
                'likes' => 43400,
                'is_published' => 1,
            ]

        );

        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate()
    {

        $anotherPost = [
            'title' => 'updateOrCreate dbhzsdhsvsasf',
            'content' => 'updated fdsfds fsdfdsf sdfsd',
            'image' => 'updateOrCreate imagesbbdaslbdl.jpg',
            'likes' => 434,
            'is_published' => 1,
        ];

        $post = Post::updateOrCreate(
            [
                'title' => 'updateOrCreate dbhzsdhsvsasf'
            ],
            $anotherPost
        );

        dd($post->content);
    }
}
