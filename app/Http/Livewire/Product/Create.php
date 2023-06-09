<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;

class Create extends Component
{

    Public $category_name ="";

    public $name ="";
    public $price ="";

    public $products=[];

    protected $rules=[
        'category_name' => 'required|string',
        'products.*.name' => 'required|string',
        'products.*.price' =>'required|numeric|min:0',
    ];



    protected $messages = [
        'products.*.name.required' => 'The prdouct name field is required.',
        'products.*.price.required' => 'This Price field is required',
        'products.*.price.numeric' => 'Please enter a valid price',
    ];

    public function updated($propertyName){

       $this->validateOnly($propertyName);

    }

    public function mount()
    {
        $this->fill([
            'products' => collect([['category_id'=> '',  'name' => '','price' => 0]]),
        ]);
    }



    public function addInput()
    {
        $this->products->push([ 'category_id'=> '', 'name' => '','price' => 0]);
    }

    public function removeInput($key)
    {
        $this->products->pull($key);

    }




    public function store(){

        $this->validate();

        $category  =  Category::Create([
            'category_name' => $this->category_name,
        ]);



        foreach($this->products as $key => $value){
            Product::create(['name' => $value['name'], 'price' => $value['price'], 'category_id'=> $category->id, 'created_at' => Carbon::now(), 'updated_at'=> Carbon::now()]);
        }



        return redirect(route('product-index'))->with('message','product successfully created');



    }



    public function render()
    {
        return view('livewire.product.create');
    }
}
