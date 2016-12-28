<section id="history" class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>History</h2>
                <hr class="small">
                <?php if (sizeof($_SESSION['history']) == 0) : ?>
                    <p>No appointment.</p>
                    <hr class="small">
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <?php foreach ($_SESSION['history'] as $appointment) : ?>
            <div class=" col-sm-offset-2 col-sm-8">
                <div class="panel panel-info">
                    <div class="panel-heading"><?php echo $appointment['visit_date'] ?></div>
                    <div class="panel-body">
                        <div class="col-sm-2">
                            <label for="facility">Facility</label>
                        </div>
                        <div class="col-sm-10">
                            <p id="facility"><?php echo $appointment['facility'] ?></p>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-2">
                            <label for="hospital_readmission">Apply for hospital readmission</label>
                        </div>
                        <div class="col-sm-10">
                            <p id="hospital_readmission"><?php echo $appointment['hospital_readmission'] ?></p>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-2">
                            <label for="program">Healthcare Program</label>
                        </div>
                        <div class="col-sm-10">
                            <p id="program"><?php echo $appointment['programs'] ?></p>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-2">
                            <label for="comment">Comment</label>
                        </div>
                        <div class="col-sm-10">
                            <p id="comment"><?php echo $appointment['comment'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <p class="text-center"><a class="btn btn-default" href="<?php echo SITE_URL; ?>">Go to Homepage</a></p>
        </div>
    </div>
</section>
