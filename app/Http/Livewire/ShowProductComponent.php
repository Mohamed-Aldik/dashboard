<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ShowProductComponent extends Component
{
    use WithPagination;
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', 'Product has been delete successfully!');
    }
    public function render()
    {
        $orders = Product::count();
        $prices = Product::sum('price');;
        $products = Product::paginate(10);
        return view('livewire.show-product-component', ['products' => $products,'prices' => $prices,'orders' => $orders]);
    }
}
