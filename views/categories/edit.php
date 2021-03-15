<?php 
    require_once('../../app/models/Category.php');
    if(in_array($_SERVER['REQUEST_METHOD'], ['GET'])) {
        $category = new Category();
        $cat= $category->getCategoryById($_GET['id']);
    }
?>
<?php include('../template/header.php') ?>
<?php include('../template/navbar.php') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Update Category
                </div>
                <div class="card-body">
                    <form action="service/update.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cat->id ?>">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $cat->name ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-warning">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../template/footer.php') ?>