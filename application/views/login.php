<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>INSPINIA | Login</title>


        <!-- Toastr style -->
        <link href="<?php echo base_url('assets/css/plugins/toastr/toastr.min.css'); ?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/animate.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    </head>

    <body class="gray-bg">

        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div style="margin-top: 200px">

                <h3>Welcome to MBM</h3>



                <?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if ($error) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $error; ?>                    
                    </div>
                <?php
                }
                $success = $this->session->flashdata('success');
                if ($success) {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $success; ?>                    
                    </div>
                <?php } ?>


                <form class="m-t" role="form" action="<?php echo base_url(); ?>loginMe" method="post">
                    <!--                <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Username" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" required="">
                                    </div>-->

                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="email" required />
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>


                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password" required />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>


                    <a href="#"><small>Forgot password?</small></a>





                </form>
                <p class="m-t"> <small>Questa applicazione é di prorpietá di Mediaedit<br>
                        Partita I.V.A. n.08648741000 soc di persone 2011.</small> </p>
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

    </body>

</html>
