<?php

namespace App\Livewire;

use Livewire\Component;

class CartSidebar extends Component
{
    public $isOpen = false;
    public $items = [];
    public $total = 0;
    
    protected $listeners = ['openCart'=> 'show'];
    // protected $listeners = ['addToCart'];

public function addToCart($productId)
    {
        $product = collect($this->products)->firstWhere('id', $productId);

        // Example: Add product to session cart
        session()->push('cart', $product);

        // Notify user
        $this->dispatchBrowserEvent('notify', [
            'message' => "{$product['name']} added to cart!"
        ]);
    }

    public function show(){
        $this->isOpen=true;
    }
    public function remove($id){
        $this->items = collect($this->items)->reject(fn($item) =>$item['id']==$id )->toArray();
        $this->total = collect($this->items)->sum(fn($item) =>$item['price'] * $item['quantity'] );
    }

    
    public function render()
    {

        return view('livewire.cart-sidebar');
    }
}
