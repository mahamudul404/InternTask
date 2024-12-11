<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>CRUD using AJAX</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="text-center m-2">Product List</h2>
                <div class="d-flex justify-content-between align-items-center mb-3 p-3 bg-light rounded shadow-sm">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="fa fa-plus me-1"></i> Add Product
                    </button>

                    <a href="{{ route('welcome') }}" class="btn btn-outline-secondary">
                        <i class="fa fa-arrow-left me-1"></i> Back
                    </a>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr class="text-center">
                                <th scope="row"> {{ $key + 1 }} </th>
                                <td> {{ $product->name }} </td>
                                <td> {{ $product->price }} </td>
                                <td>
                                    <a href="#" class="btn btn-primary update_product_form" data-bs-toggle="modal"
                                        data-bs-target="#updateModal" data-id = "{{ $product->id }}"
                                        data-name = "{{ $product->name }}" data-price = "{{ $product->price }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger delete_product"
                                        data-id = "{{ $product->id }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    @include('products.add_product_modal')
    @include('products.update_product_modal')
    @include('products.product_js')


</body>

</html>
