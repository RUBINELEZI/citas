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
            <div class="col-md-4"  >
                <div class="img-container-background">
                    <div class="img-container">
                        <img src="<?php echo $posts->img_url ?>" class="img-responsive h-100">
                    </div>
                </div>
<!--                <img src="--><?php //echo $posts->img_url ?><!--"  class="img-fluid  h-100 w-100"  alt="wrong">-->
            </div>
            <div class="col-md-8">
                <div class="card-block px-2">
                    <a href="<?php echo URL ?>posts/show/<?php echo $posts->postId?>" class="text-dark"><h4 class="card-title mt-2"><?php echo $posts->title ?></h4></a>
                    <p class="card-text" style=" height: 100px;overflow: hidden;text-overflow: ellipsis;"><?php echo $posts->post; ?></p>
                    <a href="<?php echo URL ?>posts/show/<?php echo $posts->postId?>" class="btn btn-primary mb-2">Show More</a>
                </div>
            </div>
        </div>
        <div class="card-footer w-100 text-muted">
            Writen By: <?php echo $posts->name ?> on <?php echo $posts->created_at ?>
        </div>
    </div>
    <style>
        .img-container-background {
            height: 250px;
            width: 100%;
            overflow: hidden;
            display:block;
            background: whitesmoke;
            display: table;
            position: relative;
        }

        .img-container {
            height: 250px;
            width: 100%;
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }

        .img-container img {
            margin: auto;
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 100%;
        }
    </style>

<?php endforeach; ?>

<?php require APPROOT . '/views/special/footerS.php'; ?>
