<div>
    <form wire:submit.prevent="edit">
        <div class=" add-input">
            <div class="col-md-5">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter category name" wire:model="category.category_name">
                    @error('category_name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row justify-content-end">


                <div class="col-md-2 ">
                    <button class="btn text-white btn-info btn-sm" wire:click="addInput">Add</button>
                </div>
            </div>
        </div>

        @foreach($products as $key => $product)
            <div class=" add-input">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter product name" wire:model.lazy="products.{{$key}}.name">
                            @error('products.'.$key.'.name') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model.lazy="products.{{$key}}.price" placeholder="Enter product price">
                            @error('products.'.$key.'.price') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    @if($key > 0)
                    <div class="col-md-2">
                        <button class="btn btn-danger btn-sm" wire:click.prevent="removeInput({{$key}})">Remove</button>
                    </div>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-success btn-sm" wire:click.prevent="edit">Submit</button>
            </div>
        </div>

    </form>
</div>
