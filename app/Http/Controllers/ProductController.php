<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function welcome()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'        => 'required',
            'description' => 'required',
            'category'    => 'required',

        ],[

            'name.required'        => 'El campo nombre es obligatoria',
            'description.required' => 'El campo descripcion es obligatorio',
            'category.required'    => 'El campo categoria es obligatorio',

        ]);

        $product = new Product;

        $product->name=$request->name;
        $product->description=$request->description;
        $product->idCategory=$request->category;

        $product->save();

        return redirect('/Producto')->with('status', 'El producto fue creado');
    }

    public function index()
    {
        $product = Product::all();
        
        return view('product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $dato)
    {
        $category = Category::all();

        return view('edit', compact('dato', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $dato)
    {
        $request->validate([

            'name'        => 'required',
            'description' => 'required',
            'category'    => 'required',

        ],[

            'name.required'        => 'El campo nombre es obligatoria',
            'description.required' => 'El campo descripcion es obligatorio',
            'category.required'    => 'El campo categoria es obligatorio',

        ]);
        
        $dato->name = $request->name;
        $dato->description = $request->description;
        $dato->idCategory = $request->category;

        $dato->save();
        return redirect('/Producto')->with('status', 'El producto fue actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $dato)
    {
        $dato->delete();

        return redirect('/Producto')->with('status', 'El producto fue borrado correctamente');
    }
}
