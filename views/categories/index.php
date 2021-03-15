<?php include('../template/header.php') ?>
<?php include('../template/navbar.php') ?>
<?php
    require_once('../../app/models/Category.php');
    $category = new Category();
    $listCategories = $category->getAllCategories();
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <a href="create.php" class="btn btn-primary text-uppercase">
                Add Category
            </a>
            <hr>
            <div class="card">
                <div class="card-header">
                    List Categories
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listCategories as $category){ ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $category->id; ?>
                                </th>
                                <td>
                                    <?php echo $category->name; ?>
                                </td>
                                <td>
                                    <a href="edit.php?id=<?php echo $category->id; ?>" class="btn btn-warning text-uppercase">Edit</a>
                                    <a href="service/delete.php?id=<?php echo $category->id; ?>" class="btn btn-danger text-uppercase">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../template/footer.php') ?>