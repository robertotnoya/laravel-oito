<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreUpdateCategoryFormRequest;


class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index(Request $request)
    {
        $categories = $this->category->getResults($request);
        return response()->json($categories, 200); 
    }

    public function store(StoreUpdateCategoryFormRequest $request)
    {
        $category = $this->category->create($request->all());
        
        return response()->json($category, 201);
    }

    public function update(StoreUpdateCategoryFormRequest $request, $id){
        if(!$category = $this->category->find($id))
            return response()->json(['error' => 'Categoria nao encontrada'], 404);

        $category->update($request->all());

        return response()->json($category, 200);
    }

    public function delete($id)
    {
        if(!$category = $this->category->find($id))
            return response()->json(['error' => 'Categoria nao encontrada'], 404);    
    
        $category->delete($id);

        return response()->json(['success' => 'Deleted successfully'], 204);

    }

    public function show($id)
    {
        if(!$category = $this->category->find($id))
            return response()->json(['error' => 'Categoria não encontrada'], 401);

        return response()->json($category, 200);    

    }
}
