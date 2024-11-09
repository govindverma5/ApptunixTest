<?php 
namespace App\Gateways;

use App\Models\Product;

class ProductGateway{
    
    public $product_model;

    public function __construct()
    {
        $this->product_model = new Product();
    }

    public function getAllProducts()
    {
        $products = $this->product_model;
        return $products;
    }

    public function getProductDetails(int $id)
    {
        $product = $this->product_model->find($id);
        return $product;

    }

    public function search(string $search_keyword)
    {
        $filtered_data = Product::where('name','like',"%$search_keyword%");
        return $filtered_data;
    }

}


?>