<?php

namespace App\Http\Controllers;

use App\Models\PostInfos;
use App\Models\Posts;
use App\Models\Tags;
use Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * To Store all the posts initialisation.
     *
     * @var Collection $posts;
     */
    private Collection $posts;

    /**
     * To restrict the user & check if the user is logged in or not.
     */
    public function __construct() {
        $this->middleware('auth', ['except' => ['show']]);
        $this->posts = Posts::all();
    }

    public function index() {
        $posts = $this->posts->where('author', '=', auth()->user()->id);
        if (Auth::user()->is_admin === true) {
            $posts = $this->posts;
        }
        return view('pages.posts.index', compact('posts'));
    }

    public function create() {
        $tags = Tags::all();
        return view('pages.posts.create', compact('tags'));
    }

    public function store(Request $request) {
        $data = $this->validate($request, [
            'title' => 'required|string|min:5',
            'tags' => 'bail|required',
            'tags.*' => 'bail|required',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,bmp'
        ]);
        $data['slug'] = SlugService::createSlug(Posts::class, 'slug', $data['title']);
        $file = $request->file('image');
        $data['image_name'] = $data['title'] . '-' . rand(1, 1000) . '.' . $file->extension();
        $post = Posts::create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'content' => $data['description'],
            'image' => $data['image_name'],
            'author' => Auth::user()->id,
            'publish' => true
        ]);
        if ($post !== null) {
            $file->move(storage_path('app/public/posts/'), $data['image_name']);
            foreach ($data['tags'] as $tag) {
                PostInfos::create([
                    'tag_id' => $tag,
                    'post_id' => $post['id']
                ]);
            }
            return redirect()->route('blog.index')->with('success', 'Post Created & Published successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }

    public function show($slug) {
        dd($slug);
    }

    public function edit($id) {
        dd($id);
    }

    public function update(Request $request, $id) {
        dd($request, $id);
    }

    public function destry($id) {
        dd($id);
    }
}
