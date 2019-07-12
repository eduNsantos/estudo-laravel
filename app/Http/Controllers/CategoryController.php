<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use  App\Http\Requests\StoreCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->getCategories();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreCategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        $category = Category::create($request->all());

        if ($category) {
            $newCategory = Category::all()->last();
            
            return Response()->json([
                'status' => 200,
                'message' => 'Categoria cadastrada com sucesso!',
                'newCategory' =>  $newCategory
            ]);
        } else {
            return Response()->json([
                'status' => 500,
                'message' => 'Erro interno do servidor'
            ]);
        }
    }

    public function getCategories()
    {
        return Category::all();
    }

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
    public function edit($id)
    {
        $category = new Category;
        $category = $category->findOrFail($id);
        $categories = $category->all();

        return view('category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreCategory  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategory $request, $id)
    {
        $category = Category::find($id);
        $category->fill([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active
        ]);
        $category->save();

        
        session()->flash('alert', 'Categoria alterada com sucesso!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::destroy($id);

        return Response()->json([
            'message' => 'Item ' . $id . ' excluído com sucesso!',
            'status' => 200 
        ]);
    }

    /**
     * deactive
     *
     * @param  int $id
     *
     * @return void
     */
    public function deactive($id)
    {
        $category = Category::find($id);
        $category->status = !$category->status;
        $category->save();

        $categoryNewStatus = Category::find($id)->get();

        return Response()->json([
            'categoryNewStatus' => $categoryNewStatus
        ]);

    }
}
