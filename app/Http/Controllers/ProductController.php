<?php

namespace App\Http\Controllers;

use App\Gateways\ProductGateway;
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
        $products = $this->product_gateway->getAllProducts()->all();
        return view('products.index',compact('products'));
    }

    public function getProductDetails(int $id)
    {
        $product = $this->product_gateway->getProductDetails($id);
        return view('products.details',compact('product'));

    }


}
