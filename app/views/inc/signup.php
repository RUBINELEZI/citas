<?php require APPROOT . '/views/inc/header.php'; ?>


<section class="signup" style="margin-top: 15%;">

    <div class="signup-content">


            <div class="signup-form">

                <h2 class="form-title">Sign up</h2>
                <form action="<?php echo URL ?>Users/sign_up" method="POST" class="register-form" id="register-form">
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="name" placeholder="Your Name" 
                               class="<?php echo (!empty($data['name_err'])) ? 'is-invalid' : '' ?> " value="<?php echo $data['name'] ?>" />
                        <span class="invalid-feedback"><?php echo $data['name_err'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email" 
                               class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['email'] ?>" />
                        <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Password" 
                               class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['password'] ?>" />
                        <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" 
                        class="<?php echo (!empty($data['confirm_pass_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['confirm_pass'] ?>" />
                        <span class="invalid-feedback"><?php echo $data['confrim_pass_err'] ?></span>
                    </div>
                    
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
        <div class="signin-image">
            <figure><img src="<?php echo URL ?>img/login/signup-image.jpg" alt="sing up image"></figure>
            <a href="<?php echo URL ?>users/index" class="signup-image-link">I am already member</a>
        </div>

    </div>

</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>

