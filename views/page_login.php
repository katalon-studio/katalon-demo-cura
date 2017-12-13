<section id="login" class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>Login</h2>
                <p class="lead">Please login to make appointment.</p>
                <?php if (_f::getError() !== null) : ?>
                    <p class="lead text-danger"><?php echo _f::getError(); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-sm-offset-3 col-sm-6">
                <form class="form-horizontal" action="<?php echo SITE_URL.'authenticate.php'; ?>" method="post">
                    <div class="alert alert-info">
                        <div class="form-group">
                            <label for="demo_account" class="col-sm-4 control-label">Demo account</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                  <span class="input-group-addon" id="demo_username_label"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                                  <input type="text" class="form-control" placeholder="Username" aria-describedby="demo_username_label" value="<?php echo USERNAME; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <div class="col-sm-offset-4 col-sm-8">
                                <div class="input-group">
                                  <span class="input-group-addon" id="demo_password_label"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                  <input type="text" class="form-control" placeholder="Password" aria-describedby="demo_password_label" value="<?php echo PASSWORD; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txt-username" class="col-sm-4 control-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="txt-username" name="username" placeholder="Username" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txt-password" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="txt-password" name="password" placeholder="Password" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button id="btn-login" type="submit" class="btn btn-default">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
