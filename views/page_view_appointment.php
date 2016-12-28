<section id="summary" class="section bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2>Appointment Confirmation</h2>
                <p class="lead">Please be informed that your appointment has been booked as following:</p>
                <hr class="small">
            </div>
            <div class="col-xs-offset-2 col-xs-8">
                <div class="col-xs-4">
                    <label for="facility">Facility</label>
                </div>
                <div class="col-xs-8">
                    <p id="facility"><%= $facility %></p>
                </div>
            </div>
            <div class="col-xs-offset-2 col-xs-8">
                <div class="col-xs-4">
                    <label for="hospital_readmission">Apply for hospital readmission</label>
                </div>
                <div class="col-xs-8">
                    <p id="hospital_readmission"><%= $hospital_readmission %></p>
                </div>
            </div>
            <div class="col-xs-offset-2 col-xs-8">
                <div class="col-xs-4">
                    <label for="program">Healthcare Program</label>
                </div>
                <div class="col-xs-8">
                    <p id="program"><%= $programs %></p>
                </div>
            </div>
            <div class="col-xs-offset-2 col-xs-8">
                <div class="col-xs-4">
                    <label for="visit_date">Visit Date</label>
                </div>
                <div class="col-xs-8">
                    <p id="visit_date"><%= $visit_date %></p>
                </div>
            </div>
            <div class="col-xs-offset-2 col-xs-8">
                <div class="col-xs-4">
                    <label for="comment">Comment</label>
                </div>
                <div class="col-xs-8">
                    <p id="comment"><%= $comment %></p>
                </div>
            </div>
            <div class="col-xs-12">
                <p class="text-center"><a class="btn btn-default" href="<?php echo SITE_URL; ?>">Go to Homepage</a></p>
            </div>
        </div>
    </div>
</section>
