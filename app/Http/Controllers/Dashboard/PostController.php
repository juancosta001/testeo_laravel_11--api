<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        $post = Post::find(1);
        $category = category::find(1);
        dd($category->posts[0]->title);
        // Post::create(
        //     ["title"=> "test title",
        //                  "slug"=> "test slug",
        //                  "content"=> "test content",
        //                  "category_id"=> 1,
        //                  "description"=> "test description",
        //                  "posted"=> "not",
        //                  "image"=> "test image",           
        //         ]
        // );
        return 'Index';
        // $post ->delete() ;

        
        // dd($post); //no es necesario actualizar todo, podes llamar solo a lo que queres actualizar
        // $post -> update(
        //     ["title"=> "test nuevo",
        //                  "slug"=> "nuevo slug",
        //                  "content"=> "nuevo content",
        //                  "category_id"=> 1,
        //                  "description"=> "nueva description",
        //                  "posted"=> "not",
        //                  "image"=> "test image",           
        //         ]
        // );



        // dd($post);
        
        // return response()->json([
        //     "name"=> 'Abigail',
        //     'state' => 'CA',
        // ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
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
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
