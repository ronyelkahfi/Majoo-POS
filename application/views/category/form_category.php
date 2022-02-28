
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
            <?= !empty($msg) ? '<div class="alert alert-success" role="alert">'.$msg.'</div>' : ''; ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="category-name" value="<?= !empty($dataCategory->category_name) ? $dataCategory->category_name : set_value('category'); ?>" class="form-control">
                    </div>
                    <div class="mb-3 text-end">
                        <a href="<?= base_url("category") ?>" class="btn btn-danger">Back to List Category</a>
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>