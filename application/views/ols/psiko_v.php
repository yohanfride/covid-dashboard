<?php include('header.php'); ?>

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><?= $title?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url();?>schedule">Schedule</a></li>
                            <li class="breadcrumb-item active"><?= $title?></li>
                        </ol>
                    </div>                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Screening for Generalized Anxiety Disorder (GAD)</h4>
                                <h6 class="card-subtitle">Please answer this following question:</h6>
                                 <form class="form-material m-t-40" name="psiko">
                                 <?php if(!empty($error)){ ?>
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                                            <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
                                            <?= $error;?>
                                            <span class="text-semibold">try submitting again</span><br/>
                                        </div>
                                        <?php } if(!empty($success)){ ?>
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                                            <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3>
                                            <?= $success;?>                                                 
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label class="col-md-12" for="q1">Do you experience excessive worry?</label>
                                        <div class="col-md-12">
                                            <input type="radio" id="q1" name="answer1" value="Yes">Yes
                                            <input type="radio" id="q1" name="answer1" value="No">No
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="q2">Is your worry excessive in intensity, frequency, or amount of distress it causes? </label>
                                        <div class="col-md-12">
                                            <input type="radio" id="q2" name="answer2" value="Yes">Yes
                                            <input type="radio" id="q2" name="answer2" value="No">No
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="q3">Do you find it difficult to control the worry (or stop worrying) once it starts?</label>
                                        <div class="col-md-12">
                                            <input type="radio" id="q3" name="answer3" value="Yes">Yes
                                            <input type="radio" id="q3" name="answer3" value="No">No
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="q4">Do you worry excessively or uncontrollably about minor things such as being late for an appointment, minor repairs, homework, etc.?</label>
                                        <div class="col-md-12">
                                            <input type="radio" id="q4" name="answer4" value="Yes">Yes
                                            <input type="radio" id="q4" name="answer4" value="No">No
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="button" class="btn btn-info" value="Submit" onclick="packageTotal();">
                                        <button type="reset" class="btn btn-inverse">Cancel</button>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-md-12">Kesimpulan :</label>
                                        <input type="text" name="total">
                                    </div>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript" src="<?= base_url()?>assets/js/psiko.js"></script>