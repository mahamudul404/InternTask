    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.add_product', function(e) {
                e.preventDefault();
                let name = $('#name').val();
                let price = $('#price').val();

                $.ajax({
                    url: '{{ route('products.store') }}',
                    type: 'POST',
                    data: {
                        name: name,
                        price: price
                    },
                    success: function(response) {
                        if (response.status == 'success') {

                            toastr.success(response.message, 'Product added successfully');

                            $('#addModal').modal('hide');
                            $('#add_product_form')[0].reset();
                            $('.table').load(location.href + ' .table');
                        }
                    },

                    // error show
                    error: function(response) {
                        $('.eerMsgContainer').html('');
                        $('.eerMsgContainer').append('<div class="alert alert-danger">' +
                            response.responseJSON.errors.name + '</div>');
                        $('.eerMsgContainer').append('<div class="alert alert-danger">' +
                            response.responseJSON.errors.price + '</div>');
                    }
                });
            });

            // show product update modal
            $(document).on('click', '.update_product_form', function(e) {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let price = $(this).data('price');

                $('#update_id').val(id);
                $('#update_name').val(name);
                $('#update_price').val(price);

            });


            // update product
            $(document).on('click', '.update_product', function(e) {
                e.preventDefault();

                let update_id = $('#update_id').val();
                let update_name = $('#update_name').val();
                let update_price = $('#update_price').val();

                $.ajax({
                    url: '{{ route('product.update') }}',
                    type: 'POST',
                    data: {
                        update_id: update_id,
                        update_name: update_name,
                        update_price: update_price
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            toastr.success(response.message, 'Product updated successfully');
                            $('#updateModal').modal('hide');
                            $('#update_product_form')[0].reset();
                            $('.table').load(location.href + ' .table');
                        }
                    },

                    // error show
                    error: function(response) {
                        $('.eerMsgContainer').html('');
                        $('.eerMsgContainer').append('<div class="alert alert-danger">' +
                            response.responseJSON.errors.name + '</div>');
                        $('.eerMsgContainer').append('<div class="alert alert-danger">' +
                            response.responseJSON.errors.price + '</div>');
                    }
                });
            });

            // delete product
            $(document).on('click', '.delete_product', function(e) {
                e.preventDefault();

                let product_id = $(this).data('id');
                if (confirm('Are you sure you want to delete this product?')) {

                    $.ajax({
                        url: '{{ route('product.delete') }}',
                        type: 'POST',
                        data: {
                            product_id: product_id
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                toastr.success(response.message,
                                    'Product deleted successfully');
                                $('.table').load(location.href + ' .table');
                            }
                        },
                    });
                }
            });


        });
    </script>
