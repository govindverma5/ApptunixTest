<?php

namespace App\Http\Controllers\api;

use App\Gateways\ProductGateway;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public $product_gateway;
    
    public function __construct()
    {
        $this->product_gateway = new ProductGateway();
    }

    public function index()
    {
        
        $products = $this->product_gateway->getAllProducts()->paginate();
        return response()->json($products,200);
    }

    public function productDetails(int $id)
    {

        $product = $this->product_gateway->getProductDetails($id);
        return response()->json($product,200);
    }

    public function searchProduct(Request $request)
    {
        $data = $this->product_gateway->search($request->search_keyword)->paginate();
        return response()->json($data,200);
        
    }
}
