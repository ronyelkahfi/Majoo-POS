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
                <table class="table">
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
                    <tbody>
                        <?php 
                        foreach($dataProducts as $row){
                            $btnEdit = '<a href="'.base_url('product/form_product/'.$row->id).'"><i class="fa-solid fa-pen-to-square"></i></a>';
                            $btnDelete = '<a class="text-danger" href="'.base_url('product/delete/'.$row->id).'"><i class="fa-solid fa-trash"></i></a>';
                            echo '<tr>
                                    <td>'.$row->product_name.'</td>
                                    <td>'.$row->category_name.'</td>
                                    <td>'.$row->price.'</td>
                                    <td>'.html_entity_decode($row->description).'</td>
                                    <td><img src="'.base_url("upload/product/".$row->image_name).'"></td>
                                    <td>'.$btnEdit." ".$btnDelete.'</td>
                            </tr>';
                        }
                        ?>
                        
                    </tbody>
                </table>
                
            </div>
            <div class="d-flex align-items-end flex-column">
                <div class="ml-auto p-2">
                <?= $this->pagination->create_links(); ?>
                    </div>
                    </div>
        </div>
    </div>
</section>