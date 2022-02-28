<section>
    <div class="container mt-5 pt-3">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $title ?></h1>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="<?= base_url("category/form_category") ?>" class="btn btn-primary">Add Category</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= !empty($msg) ? '<div class="alert alert-success" role="alert">'.$msg.'</div>' : ''; ?>
            </div>    
        
            <div class="col-md-12 table-responsive" >
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Option</th>
                        </th>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($categories->result() as $category){
                            $btnEdit = '<a href="'.base_url('category/form_category/'.$category->id).'"><i class="fa-solid fa-pen-to-square"></i></a>';
                            $btnDelete = '<a class="text-danger" href="'.base_url('category/delete/'.$category->id).'"><i class="fa-solid fa-trash"></i></a>';

                            echo '<tr>
                                <td>'.$category->category_name.'</td>
                                <td>'.$btnEdit." ".$btnDelete.'</td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>