<section id="login" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Login</h2>
                <p class="lead">Please login to make appointment.</p>
                <?php if (_f::getError() !== null) : ?>
                    <p class="lead text-danger"><?php echo _f::getError(); ?></p>
                <?php endif; ?>
            </div>
            <form class="form-horizontal" action="<?php echo SITE_URL.'authenticate.php'; ?>" method="post">
                <div class="form-group">
                    <label for="txt-username" class="col-lg-offset-3 col-lg-2 control-label">Username</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="txt-username" name="username" placeholder="Username" value="<?php echo USERNAME; ?>" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txt-password" class="col-lg-offset-3 col-lg-2 control-label">Password</label>
                    <div class="col-lg-4">
                        <input type="password" class="form-control" id="txt-password" name="password" placeholder="Password" value="<?php echo PASSWORD; ?>" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-5 col-lg-4">
                        <button id="btn-login" type="submit" class="btn btn-default">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
