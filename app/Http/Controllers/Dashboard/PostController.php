<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        // session()->flush(); // borra todas las sesiones
        // session()->regenerate();
        // session()->forget(""); // borra una key en especifico
        // session(['key'=> 'value']); //asigna una llave a la sesion
        $posts = Post::paginate(3);
       
        return view("dashboard/post/index", compact('posts'));

        // $post = Post::find(1);
        // $category = category::find(1);
        // dd($category->posts[0]->title);
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
        // return 'Index';
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
        $categories = Category::pluck('id','title'); //con pluc se le indican los valores
        $post = new Post(); //sirve para inicializar el objeto, para luego poder usarlo en el form de creacion
    
        return view('dashboard/post/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {   
        
        Post::create($request->validated()); // llama a la validacion del archivo aparte
        
        
        return to_route('post.index')->with('status', 'Publicacion Creada');
        
        // $validated = Validator::make($request -> all(),
        // [
        //     'title'=> 'required|min:5|max:500',
        //     'slug'=> 'required|min:5|max:500',
        //     'content'=> 'required|min:7',
        //     'category_id' => 'required|integer',
        //     'description' => 'required|min:7',
        //     'posted' => 'required',

        // ]);
        // dd($validated); 
        
        // $request->validate([
        //     'title'=> 'required|min:5|max:500',
        //     'slug'=> 'required|min:5|max:500',
        //     'content'=> 'required|min:7',
        //     'category_id' => 'required|integer',
        //     'description' => 'required|min:7',
        //     'posted' => 'required',

        // ]);
        
        // echo 'not';


        // Post::create(
        //         ["title"=> $request->all()['title'],
        //                      "slug"=> $request->all()['slug'],
        //                      "content"=> $request->all()['content'],
        //                      "category_id"=> $request->all()['category_id'],
        //                      "description"=> $request->all()['description'],
        //                      "posted"=> $request->all()['posted'],
        //                     // "image"=> $request->all()['image'],           
        //             ]
        //     );
        // dd($request->all()['title']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
    return view ('dashboard/post/show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) //recibe la peticion del usuario
    {
        $categories = Category::pluck('id','title');
        return view('dashboard.post.edit', compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Post $post) //actualiza
    {
        $data = $request -> validated();  

        //imagen
        if(isset($data['image'])){
            $data['image'] = $filename = time().'.'.$data['image']->extension(); // es una doble asignacion, es como decir que data y filename tienen los mismos valores
            $request->image->move(public_path('uploads/post'),$filename);
        }
        
        //imagen
        $post ->update($data);  
        return to_route('post.index') ->with('status', 'Publicacion Modificada');  
    }

   
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index')->with('status', 'Publicacion Borrada');
    }
}
