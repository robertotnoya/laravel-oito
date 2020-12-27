<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    public function getResults($request)
    {
        $query = $this->select('products.*')->selectRaw('categories.name AS category');
        $query->join('categories', 'categories.id', '=', 'products.category_id');

        if($request->name <> ''){
            $query->where('products.name','LIKE','%'.$request->name.'%');
        }
        if($request->category <> ''){
            $query->where('categories.name',$request->category);
        }
        $results = $query->paginate();

        return $results;
    }
}

