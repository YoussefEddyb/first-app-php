<?php include('../template/header.php') ?>
<?php include('../template/navbar.php') ?>
<?php
    require_once('../../app/models/Post.php');
    require_once('../../app/models/Category.php');
    $post = new Post();
    $listPosts = $post->getAllPosts();
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <a href="create.php" class="btn btn-primary text-uppercase">
                Add Post
            </a>
            <hr>
            <div class="card">
                <div class="card-header">
                    List Post
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listPosts as $post){ ?>
                            <tr>
                                <td>
                                    <?php echo $post->id; ?>
                                </td>
                                <td>
                                    <?php echo $post->title; ?>
                                </td>
                                <td>
                                    <?php echo $post->content; ?>
                                </td>
                                <td style="width: 20%;">
                                    <?php
                                        if(!Empty($post->image)){
                                    ?>
                                        <img src="service/<?php echo $post->image; ?>" class="img-thumbnail w-50 h-10" alt="image post">
                                    <?php }else { ?>
                                        <p> No Image</p>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php
                                        $category = new Category();
                                        $cat= $category->getCategoryById($post->category_id);
                                        echo $cat->name; 
                                    ?>
                                </td>
                                <td>
                                    <a href="edit.php?id=<?php echo $post->id; ?>" class="btn btn-warning btn-sm text-uppercase">Edit</a>
                                    <a href="service/delete.php?id=<?php echo $post->id; ?>" class="btn btn-danger btn-sm text-uppercase">Delete</a>
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