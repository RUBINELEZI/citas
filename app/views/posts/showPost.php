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
    </style>

    <div class="mt-4">
        <a href="<?php echo URL; ?>posts" class="btn btn-light"><i class="fa fa-backward "></i> Back</a>
        <div class="row mt-4">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mb-3">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-12" >
                            <img src="data:image/jpeg;base64,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" alt="img" class=" img1 img-rounded img-responsive img-fluid" />
                           <div class="info">
                            <h4><?php echo $data['user']->name ?></h4>
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
            <div class="col-xs-12 col-sm-6 col-md-6">


                <div class="card" style="width: 100%">
                    <img src="<?php echo URL ?><?php echo $data['post']->img_url ?>" height="100%" width="100%" class="img-fluid" alt="qwerfg">

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['post']->title ?></h5>
                        <div class="card-footer w-100 text-muted">
                            Writen By: <?php echo $data['user']->name ?> on <?php echo $data['post']->created_at ?>
                        </div>
                        <p class="card-text"><?php echo $data['post']->post ?></p>


                        <div class="container">
                            <div class="row">
                                <div class="col" >
                                    <a href="<?php echo URL ?>Profiles/<?php echo $data['post']->id ?>" style="width: 30%" class="btn btn-primary w-100">Profile</a>
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