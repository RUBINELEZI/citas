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

<?php foreach ($data['posts'] as $posts ) : ?>

<div class="card card-body mb-3">
    <h4 class="card-title"><?php echo $posts->title ?></h4>
    <p class="card-text"><?php echo $posts->post; ?></p>
    <div class="bg-light p-2 mb-3">
        Writen By: <?php echo $posts->name ?>
    </div>
    <a href="<?php echo URL ?>posts/show/<?php echo $posts->postId?>" class="btn btn-dark">Show More</a>
</div>

<?php endforeach; ?>
<?php require APPROOT . '/views/special/footerS.php'; ?>
