<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image'
    ];

    public function category()
    {
        $this->belongsTo(Category::class);
    }

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

