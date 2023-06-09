<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use Livewire\Component;

use App\Models\Product;
use Carbon\Carbon;


class Edit extends Component
{
    public Category $category;
    public $products=[];


    protected $rules=[
        'category.category_name' => 'required|string',
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

    public function mount($id)
    {
        $this->category =  Category::find($id);
        $products = product::where('category_id', $id)->get();



        foreach($products as $key => $value){
            $this->products[] = ['name' => $value->name,'price' => $value->price];
        }


    }



    public function addInput()
    {
        $this->products[] = (['category_id'=> '','option' =>'','price' => '']);
    }

    public function removeInput($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products);
    }

    public function edit() {
        $this->validate();
        $this->category->update();

        $addon = Product::whereCategoryId($this->category->id)->delete();


        foreach($this->products as $key => $value){
           Product::create( ['name' => $value['name'], 'price' => $value['price'], 'category_id' => $this->category->id, 'created_at' => Carbon::now(), 'updated_at'=> Carbon::now()]);
        }

        return redirect(route('product-index'))->with('message','product successfully updated');



    }



    public function render()
    {
        return view('livewire.product.edit');
    }
}
