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
            <div class="card">
                <div class="card-header">
                    Add Post
                </div>
                <div class="card-body">
                    <form action="service/store.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" name="content" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control-file" name="image" aria-describedby="fileHelpId">
                            <small id="fileHelpId" class="form-text text-muted">Format (png,jpeg,jpg).</small>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <option>choose a category</option>
                                <?php foreach($listCategories as $category){ ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../template/footer.php') ?>