<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $deleteId = '';


    public function render()
    {
        return view('livewire.product.index', [
            "categories" => Category::paginate(5),
        ]);
    }


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }


    public function delete($id)
    {
        Category::find($id)->delete();

    }

}
