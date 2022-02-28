<section class="mt-5 pt-3">
    <div class="container">
        <div class="row">
            <?php 
            foreach($dataProducts as $row){
            ?>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="<?= base_url("upload/product/".$row->image_name) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row->product_name ?></h5>
                        <p class="card-text"><?= html_entity_decode($row->description) ?></p>
                    </div>
                    <div class="card-body text-center">
                        <a href="#" class="btn btn-primary btn-sm">Beli</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>