<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests\StoreUpdateProductFormRequest;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {   
        $this->product = $product;
    }

    public function index(Request $request)
    {
        $products = $this->product->getResults($request);
        return response()->json($products, 200);
    }

    public function store(StoreUpdateProductFormRequest $request)
    {
        $product = $this->product->create($request->all());    
        return response()->json($product, 201);
    }

    public function show($id)
    {
        if(!$product = $this->product->find($id))
            return response()->json(['error' => 'Product no found'], 404);

        return response()->json($product, 200);    
    }

    public function update(StoreUpdateProductFormRequest $request, $id)
    {
        if(!$product = $this->product->find($id))
            return response()->json(['error' => 'Product not found'], 404);

        $product->update($request->all());
        
        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        if(!$product = $this->product->find($id))
            return response()->json(['error' => 'Product not found'], 404);

        $product->delete($id);

        return response()->json(['success' => 'Product deleted successfully'], 204);
    }
}
