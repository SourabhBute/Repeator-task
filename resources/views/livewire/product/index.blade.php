<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
    @endif

    <div class="djustify-content-end gap-5">

            <a class="btn btn btn-primary float-right" href="{{route("product-create")}}"> Add Product</a>

    </div>

    <table class="table table-bordered">
        <tr>
            <th>Category Name</th>
            <th>Created_at</th>
        </tr>


        @foreach($categories as $key => $category)
            <tr>

                <td>{{ $category->category_name}}</td>
                <td>{{ $category->created_at }}</td>

                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('product-edit', $category) }}">Edit</a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" wire:click="deleteId({{ $category->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $categories->links() }}




</div>





