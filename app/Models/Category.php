<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getResults($request)
    {
        $query = $this->select('categories.*');
        if($request->name <> ''){
            $query->where('name','LIKE', "%{$request->name}%");
        }

        $results = $query->get();

        return $results;
    }


}
