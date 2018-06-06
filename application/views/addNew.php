<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>INSPINIA | Static Tables</title>

        <!-- Toastr style -->
        <link href="<?php echo base_url('assets/css/plugins/toastr/toastr.min.css'); ?>" rel="stylesheet">



        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/plugins/iCheck/custom.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/animate.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">



        <style>

.avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 50px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}


        </style>




    </head>

    <body>

        <div id="wrapper">

            <?php $this->view('menu_sx'); ?>
            <div id="page-wrapper" class="gray-bg">

                <?php $this->view('menu_top'); ?>

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Inserisci Utente</h2>

                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
                <div class="wrapper wrapper-content animated fadeInRight">






                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <!--                                <div class="ibox-title">
                                
                                
                                
                                                                    <h5>Seleziona distributore e inserisci documento di carico</h5>
                                
                                                                </div>-->
                                <div class="ibox-content" >


                                    <?php $this->load->helper("form"); ?>
                                    <form role="form" name="addUser" method="post" role="form" enctype="multipart/form-data" accept-charset="utf-8">
                                        <div class="box-body">

                                            <div class="row">
                                                    
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUpload" name="userfile" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" style="background-image: url(http://muntecno.com/wp-content/uploads/2017/02/facebookplaceholder1.png);">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>




                                            <div class="row">
                                                <div class="col-md-6">                                
                                                    <div class="form-group">
                                                        <label for="fname" id ="labelNomeCompleto" >Nome Completo</label>
                                                        <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="fname" name="fname" maxlength="128">
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email" id ="labelEmail">Email</label>
                                                        <input type="email" class="form-control required email" id="email" value="<?php echo set_value('email'); ?>" name="email" maxlength="128">
<!--                                                        <input type="email" placeholder="Enter email" id="exampleInputEmail2" class="form-control">-->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="password" id ="labelPassword">Password</label>
                                                        <input type="password" class="form-control required" id="password" name="password" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cpassword" id ="labelConfermaPassword">Conferma Password</label>
                                                        <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword" maxlength="20">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mobile" id ="labelCellulare">Cellulare</label>
                                                        <input type="text" class="form-control required digits" id="mobile" value="<?php echo set_value('mobile'); ?>" name="mobile" maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="role" id ="labelRuolo">Ruolo</label>
                                                        <select class="form-control required" id="role" name="role">
                                                            <option value="0">Seleziona Ruolo</option>
                                                            <?php
                                                            if (!empty($roles)) {
                                                                foreach ($roles as $rl) {
                                                                    ?>
                                                                    <option value="<?php echo $rl->roleId ?>" <?php
                                                                    if ($rl->roleId == set_value('role')) {
                                                                        echo "selected=selected";
                                                                    }
                                                                    ?>><?php echo $rl->role ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                        </select>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div><!-- /.box-body -->

                                        <div class="box-footer">
                                            <input type="buttom"  onclick="salva()" class="btn btn-primary" value="Submit" />
                                            <input type="reset" class="btn btn-default" value="Reset" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>

                        <?php
                        $this->load->helper('form');
                        $error = $this->session->flashdata('error');
                        if ($error) {
                            ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $this->session->flashdata('error'); ?>                    
                            </div>
                        <?php } ?>
                        <?php
                        $success = $this->session->flashdata('success');
                        if ($success) {
                            ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>

                        <div class="row">
                            <div class="col-md-12">
                                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                            </div>
                        </div>

                    </div>


                </div>

                <div class="footer">
                    <div class="pull-right">
                        10GB of <strong>250GB</strong> Free.
                    </div>
                    <div>
                        <strong>Copyright</strong> Example Company &copy; 2014-2017
                    </div>
                </div>

            </div>
        </div>




        <!-- Mainly scripts -->
        <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js'); ?>"></script>

        <!-- Peity -->
        <script src="<?php echo base_url('assets/js/plugins/peity/jquery.peity.min.js'); ?>"></script>

        <!-- Custom and plugin javascript -->
        <script src="<?php echo base_url('assets/js/inspinia.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js'); ?>"></script>

        <!-- iCheck -->
        <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>"></script>

        <!-- Peity -->
        <script src="<?php echo base_url('assets/js/demo/peity-demo.js'); ?>"></script>

        <!-- Toastr script -->
        <script src="<?php echo base_url('assets/js/plugins/toastr/toastr.min.js'); ?>"></script>

        <script type="text/javascript">

                                                toastr.options = {
                                                    "closeButton": true,
                                                    "debug": false,
                                                    "progressBar": true,
                                                    "preventDuplicates": false,
                                                    "positionClass": "toast-top-right",
                                                    "onclick": null,
                                                    "showDuration": "400",
                                                    "hideDuration": "1000",
                                                    "timeOut": "7000",
                                                    "extendedTimeOut": "1000",
                                                    "showEasing": "swing",
                                                    "hideEasing": "linear",
                                                    "showMethod": "fadeIn",
                                                    "hideMethod": "fadeOut",
                                                    "heading": "Error"
                                                };



                                                function salva()
                                                {

//                                                    $("#labelNomeCompleto").css("color", "#676a6c");
//                                                    $("#labelEmail").css("color", "#676a6c");
//                                                    $("#labelPassword").css("color", "#676a6c");
//                                                    $("#labelConfermaPassword").css("color", "#676a6c");
//                                                    $("#labelCellulare").css("color", "#676a6c");
//                                                    $("#labelRuolo").css("color", "#676a6c");
//
//                                                    if ($('#fname').val() === '') {
//                                                        toastr.error('Inserire Nome Completo', 'Attenzione!');
//                                                        $("#labelNomeCompleto").css("color", "red");
//                                                        return;
//                                                    }
//
//                                                    if ($('#email').val() === '') {
//                                                        toastr.error('Inserire Email', 'Attenzione!');
//                                                        $("#labelEmail").css("color", "red");
//                                                        return;
//                                                    }
//
//                                                    if ($('#password').val() === '') {
//                                                        toastr.error('Inserire Password', 'Attenzione!');
//                                                        $("#labelPassword").css("color", "red");
//                                                        return;
//                                                    }
//                                                    if ($('#cpassword').val() === '') {
//                                                        toastr.error('Inserire Conferma Password', 'Attenzione!');
//                                                        $("#labelConfermaPassword").css("color", "red");
//                                                        return;
//                                                    }
//
//
//                                                    if ($('#cpassword').val() != $('#password').val()) {
//                                                        toastr.error('Password e Conferma Password non uguali Conferma Password', 'Attenzione!');
//                                                        $("#labelConfermaPassword").css("color", "red");
//                                                        return;
//                                                    }
//
//
//                                                    if ($('#mobile').val() === '') {
//                                                        toastr.error('Inserire Cellulare', 'Attenzione!');
//                                                        $("#labelCellulare").css("color", "red");
//                                                        return;
//                                                    }
//
//                                                    var mobile = $('#mobile').val();
//                                                    if (mobile.length !== 10) {
//                                                        toastr.error('Inserire un Cellulare valido', 'Attenzione!');
//                                                        $("#labelCellulare").css("color", "red");
//                                                        return;
//                                                    }
//
//
//                                                    if ($('#role').val() === '') {
//                                                        toastr.error('Selezionare Ruolo', 'Attenzione!');
//                                                        $("#labelRuolo").css("color", "red");
//                                                        return;
//                                                    }



                                                    document.addUser.action = "<?php echo base_url() ?>addNewUser";
                                                    document.addUser.submit();
                                                }



        </script>




        <script>

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function () {
                readURL(this);
            });
        </script>


    </body>

</html>
