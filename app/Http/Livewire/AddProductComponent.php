<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use App\Models\Product;
use Livewire\Component;
use Carbon\Carbon;

class AddProductComponent extends Component
{
    use WithPagination;

    public $image;
    public $store_name;
    public $product_name;
    public $quantity;
    public $price;
    public $unit;
    public $size;
    protected $listeners = [
        'getLatitudeForInput'
    ];

public function getLatitudeForInput($value)
{
    if(!is_null($value))
        $this->image = $value;
}
    public function updated($fields)
    {
        $this->validateOnly($fields, [
         
            'store_name' => '',
            'product_name' => '',
            'quantity' => '',
            'price' => '',
            'unit' => '',
            'size' => '',

        ]);
    }
    public function storeProduct()
    {
        $this->validate([
           
            'store_name' => '',
            'product_name' => '',
            'quantity' => '',
            'price' => '',
            'unit' => '',
            'size' => '',

        ]);
        $product = new Product();
        if ($this->image){
        $filteredData = explode(',', $this->image);
        $unencoded = base64_decode($filteredData[1]);
        $imageName = Carbon::now()->timestamp;
        Storage::disk('local')->put($imageName.'.png', $unencoded);
        $product->image = $imageName.'.png';
        }
        $product->store_name = $this->store_name;
        $product->product_name = $this->product_name;
        $product->quantity = $this->quantity;
        $product->price = $this->price;
        $product->unit = $this->unit;
        $product->size = $this->size;
        $product->save();
        session()->flash('message', 'Product has been created successfully!');
        return redirect()->route('show.product');
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', 'Product has been delete successfully!');
    }
    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.add-product-component', ['products' => $products]);
    }
}
