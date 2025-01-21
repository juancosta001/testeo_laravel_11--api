<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        $category = Category::paginate(3);
       
        return view("dashboard/category/index", compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('id',key: 'title'); //con pluc se le indican los valores
        $categorias = new Category(); //sirve para inicializar el objeto, para luego poder usarlo en el form de creacion
    
        return view('dashboard/category/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
        {   
            Category::create($request->validated()); // Validación
            return to_route('category.index')->with('status', 'Categoria Creada'); // Redirige al índice de categorías
        }

    public function show(Category $category)
    {
    return view ('dashboard.category.show',['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return to_route('category.index')->with('status', 'Categoria Actualizada');
    }

   
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('category.index')->with('status','Categoria Eliminada Satisfactoriamente');
    }
}
