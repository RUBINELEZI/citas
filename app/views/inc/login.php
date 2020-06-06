
<div style="margin-top: 50px">

    <div class="signup-content">
            <div class="signup-image">
                <figure><img src="<?php echo URL ?>img/login/signin-image.jpg" alt="sing up image"></figure>
                
            </div>

           
            <div class="signin-form">
                <?php echo flash('register_success')?>
                <?php echo flash('access_denied')?>
                <h2 class="form-title">Sign in</h2>

                <form method="POST" class="register-form" id="login-form">
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="email" id="email" placeholder="Your Name"
                               class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?> " value="<?php echo $data['email'] ?>" />
                        <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Password" 
                               class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?> " value="<?php echo $data['password'] ?>" />
                        <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
                    </div>

                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                    </div>
                </form>
                <div class="social-login">
                <a href="<?php echo URL ?>users/sign_up" class="signup-image-link">Rregjistro dyqanin tend.</a>
                </div>
            </div>
    </div>
</div>


