<?php
namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function store(array $data)
    {
        return Product::create([
            'name' => $data['product_name'],
            'cat_id' => $data['cat_id'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'description' => $data['description'],
            'image' => $data['image'] ?? null,
            'path' => $data['path'] ?? null, // Assign the 'path' correctly
        ]);
    }
    public function update(array $data, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return null;
        }

        $product->update([
            'name' => $data['product_name'],
            'cat_id' => $data['cat_id'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'description' => $data['description'],
            'image' => $data['image'] ?? null,
            'path' => $data['path'] ?? null,
        ]);

        return $product;
    }

}
