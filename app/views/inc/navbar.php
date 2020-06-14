<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">

    <a class="navbar-brand" href="<?php echo URL ?>">Frenksion-Gaz</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!--Search bar-->
    <?php if (isset($_SESSION['user_id'])) : ?>
        <form class="mx-auto" style="width: 500px;">
            <input  style="text-align: center;" class="form-control " type="text" placeholder="Search" aria-label="Search">
        </form>
    <?php endif  ?>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo URL ?>"">Home<span class="sr-only">(current)</span></a>
                </li>

        </ul>

        <ul class="navbar-nav pull-right mr-5">
        <?php if (isset($_SESSION['user_id'])) : ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo URL ?>profiles/<?php echo $_SESSION['user_id']?>">Welcome <?php echo $_SESSION['user_name'] ?></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo URL ?>users/logout">Log Out<span class="sr-only">(current)</span></a>
            </li>
        <?php else: ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo URL ?>users/index">Log In <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL ?>users/sign_up">Register</a>
            </li>

        <?php endif  ?>
        </ul>
    </div>

</nav>