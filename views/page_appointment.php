<section id="appointment" class="section bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>Make Appointment</h2>
                <hr class="small">
            </div>
            <form class="form-horizontal" action="<?php echo SITE_URL.'appointment.php#summary'; ?>" method="post">
                <div class="form-group">
                    <label for="combo_facility" class="col-sm-offset-3 col-sm-2 control-label">Facility</label>
                    <div class="col-sm-4">
                        <select id="combo_facility" name="facility" class="form-control">
                            <option value="Tokyo CURA Healthcare Center">Tokyo CURA Healthcare Center</option>
                            <option value="Hongkong CURA Healthcare Center">Hongkong CURA Healthcare Center</option>
                            <option value="Seoul CURA Healthcare Center">Seoul CURA Healthcare Center</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-4">
                        <label for="chk_hospotal_readmission" class="checkbox-inline">
                            <input type="checkbox" id="chk_hospotal_readmission" name="hospital_readmission" value="Yes"> Apply for hospital readmission
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-offset-3 col-sm-2 control-label">Healthcare Program</label>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="programs" id="radio_program_medicare" value="Medicare" checked> Medicare
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="programs" id="radio_program_medicaid" value="Medicaid"> Medicaid
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="programs" id="radio_program_none" value="None"> None
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txt_visit_date" class="col-sm-offset-3 col-sm-2 control-label">Visit Date (Required)</label>
                    <div class="col-sm-4">
                        <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                            <input type="text" class="form-control" id="txt_visit_date" name="visit_date" placeholder="dd/mm/yyyy" autocomplete="off" required>
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txt_comment" class="col-sm-offset-3 col-sm-2 control-label">Comment</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" id="txt_comment" name="comment" placeholder="Comment" rows="10"></textarea>
                    </div>
                </div>
                <?php 
                require_once __DIR__ . '/security.php';
                $antiCSRF = new securityService();
                $antiCSRF->insertHiddenToken(); ?>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-4">
                        <button id="btn-book-appointment" type="submit" class="btn btn-default">Book Appointment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
