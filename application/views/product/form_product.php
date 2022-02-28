<section class="pt-3 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1><?= $title ?></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- <button type="button" onclick="clearForm()">test</button> -->
            <div class="col-md-6 ">
            
            <div id="message"></div>
            <form action="" method="POST" id="frm-product" enctype="multipart/form-data">
                <input type="hidden" value="<?= !empty($productID) ? $productID : '' ?>">
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="product-name" id="product-name"  value="<?= !empty($dataProduct) ? $dataProduct->product_name : '' ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <div>
                            <select name="category" class="form-control select2" id="category">
                                <option value="">Select option</option>
                                <?php 
                                foreach($categories->result() as $row){
                                    echo '<option '.((!empty($dataProduct) && $dataProduct->category_id==$row->id) ? "selected" : '').' value="'.$row->id.'">'.$row->category_name.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" id="price" value="<?= !empty($dataProduct) ? $dataProduct->price : '' ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" id="fileimage" accept="image/jpeg, image/png" value="" class="form-control">
                        <div class="progress">
                        <div class="progress-bar" role="progressbar" id="image-progress" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control"><?= !empty($dataProduct) ? $dataProduct->description : '' ?></textarea>
                    </div>
                    <div class="mb-3 text-end">
                        <a href="<?= base_url("product") ?>" class="btn btn-danger">Back To Product List</a>
                        <button type="submit"  class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    var url = "<?= base_url() ?>";
</script>