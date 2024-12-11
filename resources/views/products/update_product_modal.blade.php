<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="POST" id="update_product_form">
        @csrf
        <input type="hidden" id="update_id" name="update_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel">Update Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="eerMsgContainer">

                    </div>

                    <div class="mb-3">
                        <label for="update_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="update_name" name="update_name"
                            placeholder="Product Name">
                    </div>
                    <div class="mb-3">
                        <label for="update_price" class="form-label">Product Price</label>
                        <input type="text" class="form-control" id="update_price" name="update_price"
                            placeholder="Product Price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class=" update_product btn btn-primary">Update Product</button>
                </div>
            </div>
        </div>
    </form>
</div>
