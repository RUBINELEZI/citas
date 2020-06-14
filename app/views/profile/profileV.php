<?php require APPROOT . '/views/special/headerS.php'; ?>

<!-- <div class="row mb-3">col-s
<div class="col-xs-12 m-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="img-container-background">
                    <div class="img-container" style="width: 100%;">
                        <img src="<?php echo URL ?>public\img\uploads\5eb7dab31e58b6.31963640.jpeg" class="img-responsive h-100">
                    </div>
                </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            Bhaumik Patel</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>
                         Split button -->
                        <!-- <div class="btn-group">
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
</div> --> 
<div class="profile ">
<div class="bruh mb-3">
<div class="row lart  pt-3" >
    <div class="col-6">
       
            <div class="img-profile mr-3">
            <img src="<?php echo URL ?>public\img\uploads\5eb7dab31e58b6.31963640.jpeg" alt="img" class=" img1 img-rounded img-responsive img-fluid" />
            </div>
        
    </div>

    <div class="col-6">
    <div class="info ">
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
<div class="bio">
<div class="row mt-0 ">
    <div class="col-12">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates aliquam ex inventore velit, reiciendis temporibus maiores magnam atque! Eius animi dolores quam magni eveniet veritatis neque at nisi voluptate cupiditate.</p>
    </div>
</div>
</div>

</div>




<?php foreach ($data['profile'] as $posts ) : ?>
    
    <div class="card mb-3">
        <div class="row ">
            <div class="col-md-4"  >
                <div class="img-container-background">
                    <div class="img-container">
                        <img src="<?php echo URL?><?php echo $posts->img_url ?>" class="img-responsive h-100">
                    </div>
                </div>
<!--                <img src="--><?php //echo $posts->img_url ?><!--"  class="img-fluid  h-100 w-100"  alt="wrong">-->
            </div>
            <div class="col-md-8">
                <div class="card-block px-2">
                    <a href="<?php echo URL ?>posts/show/<?php echo $posts->id?>" class="text-dark"><h4 class="card-title mt-2"><?php echo $posts->title ?></h4></a>
                    <p class="card-text" style=" height: 100px;overflow: hidden;text-overflow: ellipsis;"><?php echo $posts->post; ?></p>
                    <a href="<?php echo URL ?>posts/show/<?php echo $posts->id?>" class="btn btn-primary mb-2">Show More</a>
                </div>
            </div>
        </div>
        <div class="card-footer w-100 text-muted">
            Writen By: <?php echo $data['user']->name ?> on <?php echo $posts->created_at ?>
        </div>
        
    </div>
    <style>
        .lart{
            margin: auto;
            width: 75%;
            
        }
        .bruh{
            background-color: #F9F9F9;
        }
        .bio{
            width: 90%;
            margin: auto;
        }

        .profile{
            margin: 0;
            padding: 0;
            
        }

        @media only screen and (max-width: 600px) {
            .info{
                float: right;
            }

            .img1{
                width: 40%;
                height: 100%;
            }

            .lart{
            margin: auto;
            width: 100%;
            
        }
        }
        
        .round{
            border-radius: 10%;
            border: 3px solid #343a40;
        }

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

      

        .img-profile {
            display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    border-radius: 50%;
            
            
        }

        .img-profile img {
            flex-shrink: 0;
    min-width: 100%;
    min-height: 100%
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

</div>



<?php require APPROOT . '/views/special/footerS.php'; ?>
