<?php require APPROOT . '/views/special/headerS.php'; ?>

<div class="row mb-3">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URL; ?>posts/add" class="btn-primary btn pull-right" role="button">
            <i class="fa fa-pencil"></i>Add Post
        </a>
    </div>
</div>

<!--flash massage-->
<?php echo flash('addedPost')?>
<?php echo flash('cantEdit')?>
<?php echo flash('deleted')?>

<?php foreach ($data['posts'] as $posts ) : ?>

    <div class="card mb-3">
        <div class="row ">
            <div class="col-4" style="margin: 0;padding-right: 0; position: relative;top: 50%">
                <img src="<?php echo $posts->img_url ?>" class="img-fluid" alt="">
            </div>
            <div class="col-8" style="margin: 0;padding: 0">
                <div class="card-block px-2">
                    <a href="<?php echo URL ?>posts/show/<?php echo $posts->postId?>" class="text-dark"><h4 class="card-title"><?php echo $posts->title ?></h4></a>
                    <p class="card-text" style=" height: 50px;overflow: hidden;text-overflow: ellipsis;"><?php echo $posts->post; ?></p>
                    <a href="<?php echo URL ?>posts/show/<?php echo $posts->postId?>" class="btn btn-primary">Show More</a>
                </div>
            </div>
        </div>
        <div class="card-footer w-100 text-muted">
            Writen By: <?php echo $posts->name ?> on <?php echo $posts->created_at ?>
        </div>
    </div>

<?php endforeach; ?>

<?php require APPROOT . '/views/special/footerS.php'; ?>
