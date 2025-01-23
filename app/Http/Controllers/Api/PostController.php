<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Storage;


use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function all()
    {
        //para solicitar la cache en json
        // if(cache() -> has("post_index")){
        //     return response()->json(cache()->get("post_index"));
        // } else{
        //      $posts = Post::get();
        //      cache()->put("post_index", $posts,0);
        //      return response()->json($posts);
        // }

        return response()->json(Cache::remember('post_index',now()->addMinutes(10), function () {
            return Post::all();
        }));
    }
    public function index()
    {
        return response()->json(Post::with('category')->paginate(10)); //con esto traemos la relacion con categoria, por eso el width
        //con estos aparecen los fks y sus datos completos
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data); // El modelo generará el slug automáticamente
        return response()->json($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post);
    }


    // public function slug(string $slug)
    public function slug(Post $post)
    {
    //    $post = Post::where('slug', $slug)->firstOrFail();
       return response ()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(StoreRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data); // El modelo se encargará del slug si cambia el título
        return response()->json($post);
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json('ok');
    }

    public function upload(Request $request, Post $post){

        $request->validate([
            'image'=> 'required|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        Storage::disk('public_upload')->delete("image/".$post->image);
        $data['image'] = $filename = time() . '.' . $request ['image']->extension();

        $request->image->move(public_path('image'), $filename);

        $post->update($data);

        return response()->json($post);
    }
}
