<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>J-ACADEMY</title>





        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('assets/vendor/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css'); ?>" rel="stylesheet" type="text/css">


        <!-- bootstrap select  -->
        <link href="<?php echo base_url('assets/vendor/bootstrap-select/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css">

        <!-- fullcalendar -->
        <link href="<?php echo base_url('assets/vendor/fullcalendar/css/fullcalendar.min.css'); ?>" rel="stylesheet" type="text/css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


        <style>


            .modal-dialog {
                width: 60%;
                /*                height: 100%;*/
                padding: 0;
            }

            .modal-content {

                width:auto; 
                height:auto;
                max-height:100%;
            }

        </style>

    </head>

    <body>

        <div id="wrapper">

            <?php $this->view('menu'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header" style="margin: 20px 0 10px">Calendario</h3>
                        <form class="form-inline" style="margin-bottom:10px;">
                            <div class="form-group " style="border:0px solid red;margin-right: 20px;" >
                                <label><i class="fas fa-calendar-alt"></i></label>
                                <button type="button" onclick="document.location.href = '<?php echo site_url('calendario?filter=appunti'); ?>'" class="btn btn-primary btn-xs" style="background: #383838;">Appunti Aziendali JPM </button>
                            </div>
                            <div class="form-group " style="border:0px solid red;margin-right: 20px;"  >
                                <label><i class="fas fa-calendar-alt"></i></label>
                                <button type="button" onclick="document.location.href = '<?php echo site_url('calendario?filter=corsi'); ?>'" class="btn btn-primary btn-xs" style="background: #f67f2a;">Corsi In AREA </button>
                            </div>
                            <div class="form-group " style="border:0px solid red;margin-right: 20px;"  >
                                <label><i class="fas fa-calendar-alt"></i></label>
                                <button type="button"  onclick="document.location.href = '<?php echo site_url('calendario?filter=jacademy'); ?>'" class="btn btn-primary btn-xs" style="background: #78145f;">Corsi J-Academy </button>
                            </div>

                            <div class="form-group " style="border:0px solid red;margin-right: 20px;"  >
                                <label><i class="fas fa-calendar-alt"></i></label>
                                <button type="button"  onclick="document.location.href = '<?php echo site_url('calendario?filter=all'); ?>'" class="btn btn-primary btn-xs" style="background: #337ab7;">Tutti i corsi </button>
                            </div>
                        </form>



                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-lg-12">




                        <div class="container" >

                            <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
                                        </div>
                                        <div class="modal-body">


                                            <div id="testmodal" style="padding: 5px 20px;">
                                                <form id="antoform" class="form-horizontal calender" role="form">

                                                    <input type="hidden" disabled="true" class="form-control" id="txtDate" name="txtDate">
                                                    <input type="hidden" class="form-control" id="colore" name="colore">
                                                    <input type="hidden" class="form-control" id="tipologia" name="tipologia">

                                                    <div class="row">

                                                        <div class="col-md-10">


                                                            <div class="form-group col-md-12" style="border:0px solid red;">
                                                                <label >Titolo</label>
                                                                <input type="text" class="form-control" id="title" name="title">
                                                            </div>
                                                            <div class="form-group col-md-12" style="border:0px solid red;">
                                                                <label>Descrizione</label>
                                                                <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                                                            </div>

                                                            <div class="form-group col-md-4" style="border:0px solid red;">
                                                                <label>Dal</label>
                                                                <input type="text" name="evtStart" id="evtStart" class="form-control " style="width:170px;"/>
                                                            </div>

                                                            <div class="form-group col-md-4" style="border:0px solid red;">
                                                                <label>Al</label>
                                                                <input type="text" name="evtEnd" id="evtEnd" class="form-control" style="width:170px;"/>
                                                            </div>


                                                            <div class="form-group col-md-4" id="divDove" style="border:0px solid red;">
                                                                <label>Dove</label>
                                                                <input type="text" class="form-control" id="dove" name="dove" style="width:200px;">
                                                            </div>


                                                            <div class="form-group col-md-12" style="border:0px solid red;" id ="tipoCalendario" >
                                                                <label><i class="fas fa-calendar-alt"></i></label>
                                                                <button type="button" id ="labelCalendario" class="btn btn-primary btn-xs" style="background: #383838;"></button>
                                                            </div>


                                                        </div> 

                                                        <div class="col-md-2">
                                                            <div class="form-group" style="border:0px solid red;">
                                                                <button type="button" id="btnAddTask" class="btn btn-primary antosubmit" style="margin-top:2px;">Save changes</button>
                                                            </div>

                                                            <div class="form-group " style="border:0px solid red;">

                                                                <select id ="tipoSelect" class="selectpicker" data-width="130" onchange="selectTipologia()">
                                                                    <option style="background: #FFF; color: #000;">Tipo</option>
                                                                    <option style="background: #383838; color: #fff;" value ="appunti">Appunti Aziendali JPM</option>
                                                                    <option style="background: #f67f2a; color: #fff;" value ="corsi">Corsi in AREA</option>
                                                                </select>
                                                            </div>
                                                        </div> 

                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                            
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="testmodal" style="padding: 5px 20px;">
                                                    <form id="antoform" class="form-horizontal calender" role="form">
                            
                                                        <input type="hidden" disabled="true" class="form-control" id="txtDate" name="txtDate">
                                                        <input type="text" class="form-control" id="colore" name="colore">
                                                        <input type="text" class="form-control" id="tipologia" name="tipologia">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Task Title</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="title" name="title">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Description</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Event start</label>
                                                            <input type="text" name="evtStart" id="evtStart" class="form-control col-xs-3" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Event end</label>
                                                            <input type="text" name="evtEnd" id="evtEnd" class="form-control col-xs-3" />
                                                        </div>
                                                         <div class="form-group">
                                                             <button type="button" id="btnAppuntiColore" class="btn btn-primary btn-sm btn-block" style="background:#383838">Appunti Aziendali JPM</button>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                             <button type="button" id="btnCorsiColore" class="btn btn-primary btn-sm btn-block" style="background:#f67f2a">Corsi in AREA</button>
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                                                <button type="button" id="btnAddTask" class="btn btn-primary antosubmit">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->


                            <!--                            <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                            
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" id="task_id" name="task_id" value="" />
                                                                        <div id="testmodal2" style="padding: 5px 20px;">
                                                                            <form id="antoform2" class="form-horizontal calender" role="form">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Title</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" id="title2" name="title2">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Description</label>
                                                                                    <div class="col-sm-9">
                                                                                        <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                                                                                    </div>
                                                                                </div>
                            
                                                                                <div class="form-group">
                                                                                    <label>Event start</label>
                                                                                    <input type="text" name="evtStart2" id="evtStart2" class="form-control col-xs-3" />
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Event end</label>
                                                                                    <input type="text" name="evtEnd2" id="evtEnd2" class="form-control col-xs-3" />
                                                                                </div>
                            
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                            
                                                                        <button type="button" id="btnUpdateTask" class="btn btn-primary antosubmit2">Update Task</button>
                                                                        <button type="button" id="btnDeleteTask" class="btn btn-danger" data-dismiss="modal">Delete Task</button>
                                                                        <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>-->

                            <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
                                        </div>

                                        <div class="modal-body">



                                            <div id="testmodal2" style="padding: 5px 20px;">
                                                <form id="antoform2" class="form-horizontal calender" role="form">
                                                    <input type="hidden" id="task_id" name="task_id" value="" />
                                                    <input type="hidden" class="form-control" id="coloreEdit" name="colore">
                                                    <input type="hidden" class="form-control" id="tipologiaEdit" name="tipologia">

                                                    <div class="row">
                                                        <div class="col-md-10">

                                                            <div class="form-group col-md-12">
                                                                <label >Titolo</label>
                                                                <input type="text" class="form-control" id="title2" name="title2">



                                                            </div>

                                                            <div class="form-group col-md-12" style="border:0px solid red;" id="divDescrizione">
                                                                <label>Descrizione</label>
                                                                <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                                                            </div>

                                                            <div class="form-group col-md-4" style="border:0px solid red;">
                                                                <label>Dal</label>
                                                                <input type="text" name="evtStart" id="evtStart2" class="form-control " style="width:170px;"/>
                                                            </div>


                                                            <div class="form-group col-md-4" style="border:0px solid red;">
                                                                <label>Al</label>
                                                                <input type="text" name="evtEnd" id="evtEnd2" class="form-control" style="width:170px;"/>
                                                            </div> 

                                                            <div class="form-group col-md-4" id="divDoveEdit" style="border:0px solid red;">
                                                                <label>Dove</label>
                                                                <input type="text" class="form-control" id="dove2" name="dove" style="width:200px;">
                                                            </div>

                                                            <div class="form-group col-md-12" style="border:0px solid red;" id ="tipoCalendarioEdit" >
                                                                <label><i class="fas fa-calendar-alt"></i></label>
                                                                <button type="button" id ="labelCalendarioEdit" class="btn btn-primary btn-xs"></button>
                                                            </div>



                                                            <div class="form-group col-md-12" id="posti" style="width: 100%;">

                                                                <div style="padding: 2px; margin-bottom: 0px;  margin-left: 7px; float: right;" id="divLinkPrenotazioni"></div>
                                                                
                                                                <div class="alert alert-danger" style="padding: 3px; margin-bottom: 0px;  margin-left: 10px; float: right;">Rifiutati: <span id="postiRifiutati"></span></div>
                                                                <div class="alert alert-warning" style="padding: 3px; margin-bottom: 0px; margin-left: 10px; float: right;">In Attesa: <span id="postiInAttesa"> </span></div>
                                                                <div class="alert alert-success" style="padding: 3px; margin-bottom: 0px; margin-left: 10px;  float: right;">Confermati: <span id="postiConfermati"></span></div>

                                                           
                                                                <div style="margin-bottom: 0px; margin-left: 10px;float: right;width: 20%;">   
                                                                    <div class="progress" style="background-color: #f2dede;margin-bottom: 5px; height: 28px;">
                                                                        
                                                                       <div class="progress-bar progress-bar-success" id="bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="8"    >
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    </div>
                                                                    <div  style="padding: 2px; margin-bottom: 0px; margin-left: 0px; float: left;;">
                                                                        Ancora <span id="postiLiberi"></span> posti liberi
                                                                    </div>

                                                                    <div style="clear: both;"></div>
                                                                </div>








                                                                <div class="form-group col-md-12" style="border:0px solid red;" id ="divLinkCorso" >

                                                                </div>

                                                            </div>


                                                            <div class="col-md-2">
                                                                <div class="form-group" style="border:0px solid red;" id="divBtnUpdateTask">
                                                                    <button type="button" id="btnUpdateTask" class="btn btn-primary antosubmit2">Update Task</button>
                                                                </div>

                                                                <div class="form-group" style="border:0px solid red;" id="divBtnDeleteTask">
                                                                    <button type="button" id="btnDeleteTask" class="btn btn-danger" data-dismiss="modal">Delete Task</button>

                                                                </div>

                                                                <div class="form-group " style="border:0px solid red;" id="divTipologiaEdit">

                                                                    <select id ="tipoSelectEdit" class="selectpicker" data-width="130" onchange="selectTipologiaEdit()">
                                                                        <option style="background: #FFF; color: #000;">Tipo</option>
                                                                        <option style="background: #383838; color: #fff;" value ="appunti">Appunti Aziendali JPM</option>
                                                                        <option style="background: #f67f2a; color: #fff;" value ="corsi">Corsi in AREA</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>


                                                </form>
                                            </div>
                                        </div>
                                        <!--                                        <div class="modal-footer">
                                        
                                                                                    <button type="button" id="btnUpdateTask" class="btn btn-primary antosubmit2">Update Task</button>
                                                                                    <button type="button" id="btnDeleteTask" class="btn btn-danger" data-dismiss="modal">Delete Task</button>
                                                                                    <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                                                                                </div>-->
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div id="calendar">

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>


        <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
        <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>


        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>


        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>


        <!-- bootstrap-select -->
        <script src="<?php echo base_url('assets/vendor/bootstrap-select/js/bootstrap-select.min.js'); ?>"></script>


        <!-- bootstrap-select -->
        <script src="<?php echo base_url('assets/vendor/fullcalendar/js/moment.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendor/fullcalendar/js/fullcalendar.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendor/fullcalendar/js/lang-all.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendor/fullcalendar/js/tasker.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendor/fullcalendar/js/bootbox.js'); ?>"></script>



        <script>

                                                                        function selectTipologia()
                                                                        {
                                                                            //alert($("#tipoSelect").val());

                                                                            if ($("#tipoSelect").val() === 'appunti') {
                                                                                $("#divDove").hide();
                                                                                $("#colore").val('#383838');
                                                                                $("#tipologia").val('appunti');
                                                                                $('#labelCalendario').attr('style', 'background: #383838;');
                                                                                $("#labelCalendario").html('Appunti Aziendali JPM');
                                                                                $("#tipoCalendario").show();
                                                                            } else {
                                                                                $("#divDove").show();
                                                                                $("#colore").val('#f67f2a');
                                                                                $("#tipologia").val('corsi');
                                                                                $('#labelCalendario').attr('style', 'background: #f67f2a;');
                                                                                $("#labelCalendario").html('Corsi in AREA');
                                                                                $("#tipoCalendario").show();
                                                                            }
                                                                        }



                                                                        function selectTipologiaEdit()
                                                                        {
                                                                            //alert($("#tipoSelect").val());

                                                                            if ($("#tipoSelectEdit").val() === 'appunti') {
                                                                                $("#divDoveEdit").hide();
                                                                                $("#coloreEdit").val('#383838');
                                                                                $("#tipologiaEdit").val('appunti');
                                                                                $('#labelCalendarioEdit').attr('style', 'background: #383838;');
                                                                                $("#labelCalendarioEdit").html('Appunti Aziendali JPM');
                                                                                $("#tipoCalendarioEdit").show();
                                                                            } else {

                                                                                $("#divDoveEdit").show();
                                                                                $("#coloreEdit").val('#f67f2a');
                                                                                $("#tipologiaEdit").val('corsi');
                                                                                $('#labelCalendarioEdit').attr('style', 'background: #f67f2a;');
                                                                                $("#labelCalendarioEdit").html('Corsi in AREA');
                                                                                $("#tipoCalendarioEdit").show();
                                                                            }

                                                                        }




                                                                        $(document).ready(function () {
                                                                            //alert(htmlEscape("<strong>Cosa vive</strong><br />"));

                                                                            // $("#divDove").hide();
                                                                            $("#divLinkCorso").hide();
                                                                            $("#tipoCalendario").hide();
                                                                            $("#divDove").hide();
                                                                            $('#tipoSelect').val('appunti');
                                                                            $("#colore").val('#383838');
                                                                            $("#tipologia").val('appunti');
                                                                            $('#labelCalendario').attr('style', 'background: #383838;');
                                                                            $("#labelCalendario").html('Appunti Aziendali JPM');
                                                                            $("#tipoCalendario").show();



                                                                            var taskTitle;
                                                                            var taskDescr;
                                                                            var taskID;

                                                                            //submit task button
                                                                            $("#btnAddTask").click(function () {

                                                                                taskTitle = $("#title").val();
                                                                                taskDescr = $("#descr").val();
                                                                                dove = $("#dove").val();
                                                                                taskDate = $("#txtDate").val();
                                                                                taskDateStart = $("#evtStart").val();
                                                                                taskDateEnd = $("#evtEnd").val();
                                                                                colore = $("#colore").val();
                                                                                tipologia = $("#tipologia").val();

                                                                                if (taskTitle !== '' || taskDescr !== '') {
                                                                                    $.ajax({
                                                                                        url: '<?php echo site_url("calendario/addtask") ?>',
                                                                                        //url: 'calendario/addtask',
                                                                                        type: 'POST',
                                                                                        data: 'title=' + taskTitle + '&description=' + taskDescr + '&dove=' + dove + '&date=' + taskDate + '&dateStart=' + taskDateStart + '&dateEnd=' + taskDateEnd + '&colore=' + colore + '&tipologia=' + tipologia,
                                                                                        success: function (response) {
                                                                                            if (response == 1) {
                                                                                                window.location = '<?php echo site_url("calendario") ?>?filter=all';
                                                                                            }
                                                                                        }
                                                                                    });
                                                                                } else {

                                                                                    bootbox.alert("Please complete the form!");
                                                                                }

                                                                            });

                                                                            //Edit task button
                                                                            $("#btnUpdateTask").click(function () {

                                                                                taskTitle = $("#title2").val();
                                                                                taskDescr = $("#descr2").val();
                                                                                dove = $("#dove2").val();
                                                                                taskID = $("#task_id").val();
                                                                                taskDateStart = $("#evtStart2").val();
                                                                                taskDateEnd = $("#evtEnd2").val();
                                                                                colore = $("#coloreEdit").val();
                                                                                tipologia = $("#tipologiaEdit").val();


                                                                                $.ajax({
                                                                                    //url: 'calendario/editask',
                                                                                    url: '<?php echo site_url("calendario/editask") ?>',
                                                                                    type: 'POST',
                                                                                    data: 'title=' + taskTitle + '&description=' + taskDescr + '&dove=' + dove + '&id=' + taskID + '&dateStart=' + taskDateStart + '&dateEnd=' + taskDateEnd + '&colore=' + colore + '&tipologia=' + tipologia,
                                                                                    success: function (response) {
                                                                                        if (response == 1) {
                                                                                            window.location = '<?php echo site_url("calendario") ?>?filter=all';
                                                                                        }
                                                                                    }
                                                                                });


                                                                            });

                                                                            $("#btnDeleteTask").click(function () {
                                                                                bootbox.confirm("Are you sure you want to remove this task?", function (response) {
                                                                                    if (response == true) {
                                                                                        $.ajax({
                                                                                            url: '<?php echo site_url("calendario/deletetask") ?>',
                                                                                            type: 'GET',
                                                                                            data: 'id=' + $("#task_id").val(),
                                                                                            success: function (response) {
                                                                                                if (response == 1) {
                                                                                                    window.location = '<?php echo site_url("calendario") ?>?filter=all';
                                                                                                }
                                                                                            }
                                                                                        });
                                                                                    }
                                                                                });
                                                                            });

                                                                        });

        </script>











        <!-- begin calendar !-->
        <script>
            //$(window).load(function () {
            $(window).on('load', function () {





                var date = new Date();


                var d = date.getDate();
                var m = date.getMonth() + 1;
                var y = date.getFullYear();

//                alert(d);
//                alert(m);
//                alert(y);
//                

                var started;
                var categoryClass;

                var calendar = $('#calendar').fullCalendar({

                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    axisFormat: 'HH:mm', // time format in day / week view
                    timeFormat: ' ',
                    defaultView: 'month',
                    selectable: true,
                    selectHelper: true,
                    lang: 'it',
                    select: function (start, end, allDay) {
                        $('#fc_create').click();

                        //alert(start.format('DD-MM-YYYY HH:mm:ss'));

//                        $('#evtStart').val(start.format('DD-MM-YYYY HH:mm:ss'));
//                        $('#evtEnd').val(end.format('DD-MM-YYYY HH:mm:ss'));

                        $('#evtStart').val(start.format('YYYY-MM-DD HH:mm:ss'));
                        $('#evtEnd').val(end.format('YYYY-MM-DD HH:mm:ss'));




                        started = start;
                        ended = end
                        $("#txtDate").val(start);

                        $(".antosubmit").on("click", function () {

                            var title = $("#title").val();
                            // alert(title);
                            if (end) {
                                ended = end
                            }
                            categoryClass = $("#event_type").val();

                            if (title) {
                                calendar.fullCalendar('renderEvent', {
                                    title: title,
                                    start: started,
                                    end: end,
                                    allDay: allDay,
                                    taskID: taskID,
                                    taskDetails: taskDetails
                                },
                                        true // make the event "stick"
                                        );
                            }
                            $('#title').val('');
                            calendar.fullCalendar('unselect');

                            $('.antoclose').click();

                            return false;
                        });
                    },
                    eventClick: function (calEvent, jsEvent, view) {
                        //alert(calEvent.title, jsEvent, view);
                        //alert(calEvent.id, jsEvent, view);

                        $("#divDoveEdit").hide();
                        $("#divTipologiaEdit").show();
                        $("#divBtnUpdateTask").show();
                        $("#divBtnDeleteTask").show();
                        $("#tipoCalendarioEdit").hide();
                        $("#divLinkCorso").hide();


                        $('#fc_edit').click();
                        $('#title2').val(calEvent.title);
                        $("#task_id").val(calEvent.id);


                        $("#postiInAttesa").text(calEvent.postiInAttesa);
                        $("#postiRifiutati").text(calEvent.postiRifiutati);
                        $("#postiConfermati").text(calEvent.postiConfermati);
                        
                        var maxPosti = calEvent.postiMax;
                        var postiLiberi = maxPosti - calEvent.postiConfermati;
                        
                         var percentuale = (calEvent.postiConfermati / maxPosti) * 100;
                        
                        $("#postiLiberi").text(postiLiberi);
                        
                        $("#bar").css('width',percentuale +'%');
                        
                        $("#divLinkPrenotazioni").html('<a href="<?php echo site_url('corsi/prenotazioni/') ?>' + calEvent.corso_id + '">Prenotazioni</a>');
                        
//                        $('#postiInAttesa').val(calEvent.postiInAttesa);
//                        $('#postiConfermati').val(calEvent.postiConfermati);
//                        $('#postiMax').val(calEvent.postiMax);



                        if (calEvent.tipologia === 'corsi') {

//                            $('#tipoSelectEdit').val('corsi');
                            $('#tipoSelectEdit').selectpicker('val', 'corsi');
                            $("#coloreEdit").val('#f67f2a');
                            $("#tipologiaEdit").val('corsi');
                            $('#labelCalendarioEdit').attr('style', 'background: #f67f2a;');
                            $("#labelCalendarioEdit").html('Corsi in AREA');
                            $("#tipoCalendarioEdit").show();
                            $("#dove2").val(calEvent.taskDove);
                            $("#divDoveEdit").show();
                            $("#posti").hide();

                        } else if (calEvent.tipologia === 'appunti') {
                            // $('#tipoSelectEdit').val('appunti');
                            $('#tipoSelectEdit').selectpicker('val', 'appunti');


                            $("#posti").hide();
                            $("#dove2").val('');
                            $("#divDoveEdit").hide();
                            $("#coloreEdit").val('#383838');
                            $("#tipologiaEdit").val('appunti');
                            $('#labelCalendarioEdit').attr('style', 'background: #383838;');
                            $("#labelCalendarioEdit").html('Appunti Aziendali JPM');
                            $("#tipoCalendarioEdit").show();
//                        
                        } else if (calEvent.tipologia === 'jacademy') {
                            //nascondo tipologia
                            
                              $("#posti").show();
                            
                            
                            $("#divDescrizione").hide();

                            $("#divTipologiaEdit").hide();
                            $("#divBtnUpdateTask").hide();
                            $("#divBtnDeleteTask").hide();
                            $("#divDoveEdit").hide();
                            $("#divLinkCorso").html('Per cambiare le date del corso clicca <a href="<?php echo site_url('corsi/edit/') ?>' + calEvent.corso_id + '">qui</a>');
                            $("#divLinkCorso").show();
                            $('#labelCalendarioEdit').attr('style', 'background: #78145f;');
                            $("#labelCalendarioEdit").html('Corsi J-ACADEMY');
                            $("#tipoCalendarioEdit").show();

                        }

                        $("#descr2").val(calEvent.taskDetails);
                        $("#evtStart2").val(calEvent.start.format('YYYY-MM-DD HH:mm:ss'));
                        $("#evtEnd2").val(calEvent.end.format('YYYY-MM-DD HH:mm:ss'));

                        categoryClass = $("#event_type").val();

                        $(".antosubmit2").on("click", function () {
                            calEvent.title = $("#title2").val();

                            calendar.fullCalendar('updateEvent', calEvent);
                            $('.antoclose2').click();
                        });
                        calendar.fullCalendar('unselect');
                    },
                    editable: false,

                    events: [
<?php foreach ($tasks as $calendar_tasks): ?>
                            {

                                id: "<?php echo $calendar_tasks['id']; ?>",
                                title: "<?php echo $calendar_tasks['task_name']; ?>",
                                taskDetails: "<?php echo $calendar_tasks['task_details']; ?>",
                                taskDove: "<?php echo $calendar_tasks['task_dove']; ?>",
                                start: "<?php echo $calendar_tasks['start']; ?>",
                                end: "<?php echo $calendar_tasks['end']; ?>",
                                color: "<?php echo $calendar_tasks['colore']; ?>",
                                tipologia: "<?php echo $calendar_tasks['tipologia']; ?>",
                                corso_id: "<?php echo $calendar_tasks['corso_id']; ?>",
                                postiInAttesa: "<?php echo $calendar_tasks['postiInAttesa']; ?>",
                                postiConfermati: "<?php echo $calendar_tasks['postiConfermati']; ?>",
                                postiRifiutati: "<?php echo $calendar_tasks['postiRifiutati']; ?>",
                                postiMax: "<?php echo $calendar_tasks['postiMax']; ?>"


                            },
<?php endforeach; ?>
                    ]

                });
            });


        </script>





    </body>

</html>
