<section>
    <div class="container mt-5 pt-3">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $title ?></h1>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12 mb-3" >
            <a href="<?= base_url("product/form_product") ?>" class="btn btn-primary">Add Product</a>
        </div>
            <div class="col-md-12 table-responsive" >
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Option</th>
                        </th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>