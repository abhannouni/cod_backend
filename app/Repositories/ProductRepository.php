<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function create(array $data)
    {
        return Product::create($data);
    }

    public function delete(int $id)
    {
        return Product::destroy($id);
    }

    public function findById(int $id)
    {
        return Product::find($id);
    }

    public function allPaginated($filters = [], $sortBy = 'name', $perPage = 10)
    {
        $query = Product::query();
        
        if (!empty($filters['category'])) {
            $query->whereHas('categories', function($q) use ($filters) {
                $q->where('name', $filters['category']);
            });
        }

        return $query->orderBy($sortBy)->paginate($perPage);
    }
}
