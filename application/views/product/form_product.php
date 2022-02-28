<section class="pt-3 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1><?= $title ?></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 ">
            <?= !empty(validation_errors()) ? '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>' : ''; ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="product-name" value="<?= set_value('product-name'); ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" value="<?= set_value('price'); ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" accept="image/jpeg, image/png" value="<?= set_value('image'); ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control"><?= set_value('description'); ?></textarea>
                    </div>
                    <div class="mb-3 text-end">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>