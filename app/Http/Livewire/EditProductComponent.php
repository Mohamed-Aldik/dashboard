<?php

namespace App\Http\Livewire;


use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use App\Models\Product;
use Livewire\Component;
use Carbon\Carbon;

class EditProductComponent extends Component
{
    use WithPagination;

    public $idd;
    public $image;
    public $store_name;
    public $product_name;
    public $quantity;
    public $price;
    public $unit;
    public $size;
    public $showDiv;
    protected $listeners = [
        'getLatitudeForInput'
    ];
    public function openDiv()
    {
        $this->showDiv =true;
    }
    public function getLatitudeForInput($value)
    {
        if(!is_null($value))
            $this->image = $value;
    }
    public function mount($id)
    {
        $this->idd = $id;
        $product = Product::find($this->idd);
        $this->store_name= $product->store_name ;
        $this->product_name= $product->product_name ;
        $this->quantity= $product->quantity ;
        $this->price= $product->price ;
        $this->unit= $product->unit ;
        $this->size= $product->size ;
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
        $product = Product::find($this->idd);
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
        session()->flash('message', 'Product has been updated successfully!');
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
        $product = Product::find($this->idd);
        return view('livewire.edit-product-component', ['product' => $product]);
    }
}