<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Index extends Component
{
    public $products;
    public $cart;
    public $search_keyword ;
    
    public function render()
    {
        
        return view('livewire.products.index');
    }
    
    public function addToCart($id)
    {
       
        if(array_search($id,(Session::get('cart') ?? [] ))){
            
        }else{
            $this->cart = $id;
        }
        
        Session::push('cart',$this->cart);
        
    }

    public function search()
    {
        $this->products = Product::where('name','like',"%$this->search_keyword%")->get();
        
    }
}
