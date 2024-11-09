<?php

namespace App\Livewire\Products;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Details extends Component
{
    
    public $product;
    public $cart;
    
    public function render()
    {
        return view('livewire.products.details');
    }

    public function addToCart($id)
    {
        if(in_array($id,(session('cart') ?? []))){

            
        }else{
            $this->cart = $id;
        }

        Session::push('cart',$this->cart);
    }
}
