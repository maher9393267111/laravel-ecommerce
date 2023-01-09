<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class Index extends Component
{

// PROPS VARIABLES
public $products, $category =[], $priceInput;


public function mount($category , $products)
{
    $this->category = $category;
    $this->products = $products;
}



    public function render()
    {
        return view('livewire.frontend.product.index' , [
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}
