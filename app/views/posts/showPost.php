<?php require APPROOT . '/views/special/headerS.php'; ?>

    <style>
        @media only screen and (max-width: 600px) {
            .info{
                float: right;
            }

            .img1{
                width: 40%;
                height: 100%;
            }
        }
        .img-container-background {
            height: 500px;
            width: 100%;
            overflow: hidden;
            display:block;
            background: gray;
            display: table;
            position: relative;
        }

        .img-container {
            height: 500px;
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

    <div class="mt-4">
        <a href="<?php echo URL; ?>posts" class="btn btn-light"><i class="fa fa-backward "></i> Back</a>
        <div class="row mt-4">
            <div class=" col-md-4  mb-3">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-12">
                            <img src="<?php echo URL ?>public\img\uploads\5eb7dab31e58b6.31963640.jpeg" alt="img" class="img1 img-rounded img-responsive img-fluid" />
                           <div class="info">
                            <h4><a href="<?php echo URL ?>Profiles/<?php echo $data['post']->user_id ?>"><?php echo $data['user']->name ?></a></h4>
                            <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                                    </i></cite></small>
                            <p>
                                <i class="glyphicon glyphicon-envelope"></i>email@example.com
                                <br />
                                <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                                <br />
                                <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>
                            <!-- Split button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary">
                                    Social</button>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span><span class="sr-only">Social</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                    <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Github</a></li>
                                </ul>
                            </div>
                           </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-3">


                <div class="card">
                    <div class="img-container-background">
                        <div class="img-container">
                            <img src="<?php echo URL ?><?php echo $data['post']->img_url ?>" class="img-responsive h-100">
                        </div>
                    </div>


                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['post']->title ?></h5>
                        <div class="card-footer w-100 text-muted">
                            Writen By: <?php echo $data['user']->name ?> on <?php echo $data['post']->created_at ?>
                        </div>
                        <p class="card-text"><?php echo $data['post']->post ?></p>


                        <div class="container">
                            <div class="row">
                                <div class="col" >
                                    <a href="<?php echo URL ?>Profiles/<?php echo $data['post']->user_id ?>" style="width: 30%" class="btn btn-primary w-100">Profile</a>
                                </div>

                         <?php if(isLogedIn()) :?>
                         <?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
                                <form action="<?php echo URL; ?>posts/delete/<?php echo $data['post']->id ?>" method="post" class="col w-30">
                                    <input type="submit" value="Delete" class="btn btn-danger w-100">
                                </form>
                                <div class="col w-30" >
                                    <a href="<?php echo URL ?>Posts/edit/<?php echo $data['post']->id ?>" style="width: 30%" class="btn btn-primary w-100">Edit</a>
                                </div>

                            </div>
                        </div>
                        <?php endif ?>
                        <?php endif ?>



                    </div>
                </div>
            </div>
        </div>

    </div>


<?php require APPROOT . '/views/special/footerS.php'; ?>