<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">


        <!-- bootstrap select  -->
        <link href="<?php echo base_url('assets/vendor/bootstrap-select/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link href="<?php echo base_url('assets/vendor/bootstrap-toggle/css/bootstrap-toggle.min.css'); ?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('assets/vendor/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css'); ?>" rel="stylesheet" type="text/css">


        <!-- jQuery -->
        <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>


        <script src="<?php echo base_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>


<!--        <style>
            .form-group {
                margin-bottom: 5px;
            }

            @media (min-width: 768px){
                .seven-cols .col-md-1,
                .seven-cols .col-sm-1,
                .seven-cols .col-lg-1  {
                    width: 100%;
                    *width: 100%;
                }
            }

            @media (min-width: 992px) {
                .seven-cols .col-md-1,
                .seven-cols .col-sm-1,
                .seven-cols .col-lg-1 {
                    width: 14.285714285714285714285714285714%;
                    *width: 14.285714285714285714285714285714%;
                }
            }

            /**
             *  The following is not really needed in this case
             *  Only to demonstrate the usage of @media for large screens
             */    
            @media (min-width: 1200px) {
                .seven-cols .col-md-1,
                .seven-cols .col-sm-1,
                .seven-cols .col-lg-1 {
                    width: 14.285714285714285714285714285714%;
                    *width: 14.285714285714285714285714285714%;
                }
            }




            ul, li{
                margin: 0;
                padding: 0;
            }
            #sortable-row { list-style:none; display: list-item; width: 100%; border: 0px solid red;}

            #sortable-row li { margin-bottom:4px; padding:0px;cursor:move;}
            #sortable-row li.ui-state-highlight { height: 0em;border:#ccc 2px dotted;
                                                  list-style-position:inside;
                                                  margin:0;
                                                  padding:0;}
            
            
            
            
            
            </style>-->

        <style>
            .form-group {
                margin-bottom: 5px;
            }

            @media (min-width: 768px){
                .seven-cols .col-md-1,
                .seven-cols .col-sm-1,
                .seven-cols .col-lg-1  {
                    width: 100%;
                    *width: 100%;
                }
            }

            @media (min-width: 992px) {
                .seven-cols .col-md-1,
                .seven-cols .col-sm-1,
                .seven-cols .col-lg-1 {
                    width: 14.285714285714285714285714285714%;
                    *width: 14.285714285714285714285714285714%;
                }
            }

            /**
             *  The following is not really needed in this case
             *  Only to demonstrate the usage of @media for large screens
             */    
            @media (min-width: 1200px) {
                .seven-cols .col-md-1,
                .seven-cols .col-sm-1,
                .seven-cols .col-lg-1 {
                    width: 14.285714285714285714285714285714%;
                    *width: 14.285714285714285714285714285714%;
                }
            }




            ul, li{
                margin: 0;
                padding: 0;
            }
            #sortable-row { list-style:none; display: list-item; width: 100%; border: 0px solid red;}

            #sortable-row li { margin-bottom:4px; padding:0px;cursor:move; width: 100%; }
            #sortable-row li.ui-state-highlight { height: 0em;border:#ccc 2px dotted;
                                                  list-style-position:inside;
                                                  margin:0;
                                                  padding:0; width: 100%; }




            .modal-dialog {
                width: 100%;
                /*                height: 100%;*/
                padding: 0;
            }

            .modal-content {
                /*                height: 100%;*/
                border-radius: 0;



                width:auto; 
                height:auto;
                max-height:100%;
            }






        </style>

    </head>

    <body>




        <div id="wrapper">

            <?php $this->view('menu'); ?>


            <form role="form" method="post" action="<?php echo site_url('corsi/setCorso/') ?>">  


                <div id="page-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--                         <button type="submit" id="btnSave"  fa-calendar style="float:right;margin-top: 10px;" class="btn btn-primary">Salva e aggiungi date  
                                                            <i class="fas fa-calendar-alt" style="font-size: 23px;"></i>
                                                        </button>-->


                            <button type="button" onclick="corsoDelete(<?php echo $corso[0]->id; ?>)" class="btn btn-danger" style="float:right;margin-top: 10px; margin-left: 10px">Cancella Corso</button>

                            <button type="submit"  id="btnSave"  fa-calendar style="float:right;margin-top: 10px;" class="btn btn-primary">Salva</button>


                            <h3 class="page-header" style="margin: 20px 0 10px">Modifica Corso</h3>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="row">

                        <div class="col-lg-12">


                            <div class="row">

                                <div class="col-lg-6"> 
                                    <!-- /.panel-heading -->
                                    <div class="panel-body" style="padding:0px">

                                        <input type="hidden" name="idCorso" id="idCorso" value="<?php echo $corso[0]->id; ?>">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#italiano" data-toggle="tab">Italiano</a>
                                            </li>
                                            <li><a href="#inglese" data-toggle="tab">Inglese</a>
                                            </li>

                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="italiano">
                                                <!--                                    <h4>Home Tab</h4>-->

                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Titolo ITA</label>
                                                        <input class="form-control input-sm" name="titolo_ITA" id="titolo_ITA" value="<?php echo $corso[0]->titolo_ITA; ?>">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Sottotitolo ITA</label>
                                                        <input class="form-control input-sm" name="sottotitolo_ITA" placeholder="Enter text" id="sottotitolo_ITA" value="<?php echo $corso[0]->sottotitolo_ITA; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Descrizione ITA</label>
                                                    <textarea class="form-control" id="descrizione_ITA" name="descrizione_ITA" rows="2"><?php echo $corso[0]->descrizione_ITA; ?></textarea>
                                                </div>


                                                <div class="form-group">
                                                    <label>Programma ITA</label>
                                                    <textarea class="form-control" id="programma_titolo_ITA" name="programma_titolo_ITA" rows="2"><?php echo $corso[0]->programma_titolo_ITA; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Programma footer ITA</label>
                                                    <input class="form-control input-sm" name="programma_footer_ITA" id="programma_footer_ITA" value="<?php echo $corso[0]->programma_footer_ITA; ?>">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Incluso ITA</label>
                                                        <input class="form-control input-sm" name="incluso_ITA" id="incluso_ITA" value="<?php echo $corso[0]->incluso_ITA; ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Escluso ITA</label>
                                                        <input class="form-control input-sm" name="escluso_ITA" id="escluso_ITA" value="<?php echo $corso[0]->escluso_ITA; ?>">
                                                    </div>
                                                </div>









                                            </div>

                                            <div class="tab-pane fade" id="inglese">
                                                <!--                                    <h4>Profile Tab</h4>-->
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Titolo ENG</label>
                                                        <input class="form-control input-sm" name="titolo_ENG" id="titolo_ENG" value="<?php echo $corso[0]->titolo_ENG; ?>" >
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Sottotitolo ENG</label>
                                                        <input class="form-control input-sm" name="sottotitolo_ENG" id="sottotitolo_ENG" value="<?php echo $corso[0]->sottotitolo_ENG; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Descrizione ENG</label>
                                                    <textarea class="form-control" id="descrizione_ENG" name="descrizione_ENG" rows="2"><?php echo $corso[0]->descrizione_ENG; ?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Programma ENG</label>
                                                    <textarea class="form-control" id="programma_titolo_ENG" name="programma_titolo_ENG" rows="2"><?php echo $corso[0]->programma_titolo_ENG; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Programma footer ENG</label>
                                                    <input class="form-control input-sm" name="programma_footer_ENG" id="programma_footer_ENG" value="<?php echo $corso[0]->programma_footer_ENG; ?>">
                                                </div>



                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Incluso ENG</label>
                                                        <input class="form-control input-sm" name="incluso_ENG" id="incluso_ENG" value="<?php echo $corso[0]->incluso_ENG; ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Escluso ENG</label>
                                                        <input class="form-control input-sm" name="escluso_ENG" id="escluso_ENG" value="<?php echo $corso[0]->escluso_ENG; ?>">
                                                    </div>
                                                </div>




                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <!-- /.col 6 -->  

                                <div class="col-lg-6" style="margin-top:42px;">

                                    <div class="form-group col-md-6" >
                                        <label>Prezzo</label>
                                        <input value="<?php echo $corso[0]->prezzo; ?>" type="number" value="0.00"  min="0.01" step="0.01" class="form-control input-sm" data-number-to-fixed="2" class="currency" name="prezzo" id="prezzo" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Aula</label>
                                        <select class="form-control input-sm" name="aula_id" >
                                            <option>Seleziona Aula</option>

                                            <?php
                                            foreach ($aula as $item):

                                                if ($corso[0]->aula_id == $item->id) {
                                                    ?>


                                                    <option selected value="<?php echo $item->id; ?>"><?php echo $item->nome_ITA; ?></option>

                                                <?php } else { ?>

                                                    <option value="<?php echo $item->id; ?>"><?php echo $item->nome_ITA; ?></option>

                                                    <?php
                                                }


                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Categoria</label>
                                        <select class="form-control input-sm" name="categoria_id" id="categoria_id">
                                            <option>Seleziona Categoria</option>
                                            <?php
                                            foreach ($categoria as $item):


                                                if ($corso[0]->categoria_id == $item->id) {
                                                    ?>


                                                    <option selected value="<?php echo $item->id; ?>"><?php echo $item->nome_ITA; ?></option>

                                                <?php } else { ?>

                                                    <option value="<?php echo $item->id; ?>"><?php echo $item->nome_ITA; ?></option>

                                                    <?php
                                                }
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>Rivolto a:</label>
                                        <select class="form-control input-sm" name="destinatario_id" id="destinatario_id">
                                            <option>Seleziona Destinatari</option>
                                            <?php
                                            foreach ($destinatari as $item):

                                                if ($corso[0]->destinatario_id == $item->id) {
                                                    ?>


                                                    <option selected value="<?php echo $item->id; ?>"><?php echo $item->nome_ITA; ?></option>

                                                <?php } else { ?>

                                                    <option value="<?php echo $item->id; ?>"><?php echo $item->nome_ITA; ?></option>
                                                    <?php
                                                }
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label>Num. Partecipanti Min</label>
                                        <select class="form-control input-sm" name="numeroPartecipantiMin" id="numeroPartecipantiMin" >
                                            <?php
                                            for ($i = 0; $i <= 10; $i++) {
                                                echo '<option ' . ($i == $corso[0]->numeroPartecipantiMin ? "selected=\'selected\'" : "") . 'value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>Num. Partecipanti Max</label>
                                        <select class="form-control input-sm" name="numeroPartecipantiMax" id="numeroPartecipantiMax">
                                            <?php
                                            for ($i = 0; $i <= 10; $i++) {
                                                echo '<option ' . ($i == $corso[0]->numeroPartecipantiMax ? "selected=\'selected\'" : "") . 'value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Num. Partecipanti Overbooking</label>
                                        <select class="form-control input-sm" name="numeroPartecipantiOverbooking" id="numeroPartecipantiOverbooking">
                                            <?php
                                            for ($i = 0; $i <= 10; $i++) {
                                                echo '<option ' . ($i == $corso[0]->numeroPartecipantiOverbooking ? "selected=\'selected\'" : "") . 'value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Location</label>

                                        <select class="form-control input-sm" name="location_id" id="location_id">
                                            <?php foreach ($location as $item): ?>
                                                <option value="<?php echo $item->id; ?>"><?php echo $item->nome; ?></option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>


                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Durata Giorni</label>
                                        <select class="form-control input-sm" name="durata" id="durata">

                                            <?php
                                            for ($i = 0; $i <= 10; $i++) {
                                                echo '<option ' . ($i == $corso[0]->durata ? "selected=\'selected\'" : "") . 'value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>


                                    <?php
                                    if ($corso[0]->shooting == 1) {
                                        $checked = "checked";
                                    } else {
                                        $checked = "";
                                    }
                                    ?>

                                    <div class="form-group col-md-3">
                                        <label style="margin-top:30px;">Shooting</label>
                                        <input type="checkbox"  <?php echo $checked; ?> data-toggle="toggle" data-size="mini" name="shooting" id="shooting">
                                    </div>

                                    <?php
                                    if ($corso[0]->internazionale == 1) {
                                        $checked = "checked";
                                    } else {
                                        $checked = "";
                                    }
                                    ?>


                                    <div class="form-group col-md-3">
                                        <label style="margin-top:30px;">Intern.</label>
                                        <input type="checkbox" <?php echo $checked; ?> data-toggle="toggle" data-size="mini"  name="internazionale" id="internazionale">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Trainer</label>
                                        <select class="form-control input-sm" name="trainer_id" id="trainer_id">
                                            <option>Seleziona Trainer</option>
                                            <?php
                                            foreach ($trainer as $item):


                                                if ($corso[0]->trainer_id == $item->id) {
                                                    ?>


                                                    <option selected value="<?php echo $item->id; ?>"><?php echo $item->cognome . " " . $item->nome; ?></option>

                                                <?php } else { ?>
                                                    <option value="<?php echo $item->id; ?>"><?php echo $item->cognome . " " . $item->nome; ?></option>
                                                    <?php
                                                }
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>


                                    <?php
                                    if ($corso[0]->mostraTrainer == 1) {
                                        $checked = "checked";
                                    } else {
                                        $checked = "";
                                    }
                                    ?>



                                    <div class="form-group col-md-4">
                                        <label style="margin-top:30px;">Mostra Trainer</label>
                                        <input type="checkbox"  <?php echo $checked; ?> data-toggle="toggle" data-size="mini" name="mostraTrainer" id="mostraTrainer">
                                    </div>

                                    <div class="form-group col-md-2">

                                    </div>
                                    <div class="form-group col-md-12" style ="margin-top:22px;">

                                        <div class="panel panel-yellow">
                                            <div class="panel-heading" style="margin-bottom:10px;">

                                                Save The Date

                                                <button type="button" class="btn btn-default btn-circle" onclick="editDate_1('0');" style="float:right;"><i class="fa fa-plus" ></i> </button>
                                            </div>


                                            <div class="panel-body">


                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Date</th>

                                                                <th style="width: 19%"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($saveTheDate as $item): ?>
                                                                <tr>
                                                                    <td><?php echo $item->gruppo; ?></td>
                                                                    <td><?php echo str_replace(",", ", ", $item->saveTheDate); ?></td>

                                                                    <td>
                                                                        <button type="button" class="btn btn-default btn-sm" onclick="editDate_1('<?php echo $item->gruppo; ?>');">
                                                                            <span class="glyphicon glyphicon-pencil " aria-hidden="true"></span>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger btn-sm" onclick="saveTheDateDelete('<?php echo $item->saveTheDate; ?>', '<?php echo $item->gruppo; ?>')">
                                                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"  ></span>
                                                                        </button>

                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            endforeach;
                                                            ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>  

                                    </div>

                                </div>                                  

                            </div>

                        </div>
                        <!-- /.row -->

                        </form>

                    </div>
                    <!-- /.col-lg-4 -->

                </div>
                <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->








    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Aggiungi date e orari</h4>
                </div>
                <div class="modal-body">


                    <input type="hidden" name="nextId" id="nextId" value="">
                    <input type="hidden" id="gruppo" value="">


                    <div class="row">
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control date" placeholder="fai click per scegliere le date..." id="dateCorso" value="">

                        </div>
                        <div class="form-group col-md-3">
                            <div style="float:left;width: 10%;vertical-align: middle; text-align: center" id="divAggiungi">
                                <button type="button" class="btn btn-primary" onclick="addGiorni();">Aggiungi giornate</button>
                            </div>
                        </div> 
                    </div>
                    <div class="row" style="border-top:0px solid #f0ad4e;">
                        <div id="some_element" class="col-md-12 row seven-cols" style="border:0px solid green;top:20px;width:105%;"></div>
                    </div>

                </div>

                <div class="modal-footer" style="margin-top:20px;">

                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div> 

            </div>
        </div>
    </div>


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>


    <!-- bootstrap-select -->
    <script src="<?php echo base_url('assets/vendor/bootstrap-select/js/bootstrap-select.min.js'); ?>"></script>



    <script src="https://cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>



    <script>


                        $("#btnModalDate").click(function () {

                            $('#nextId').val("");
                            $('#dateCorso').val("");
                            $('#gruppo').val("");
                            $("#some_element").html("");
                            $('#myModal').modal('show');
                        });

                        var edit = undefined;

                        function editDate(myDate, gruppo)
                        {









                            $.ajax({
                                url: "<?php echo site_url('corsi/getIdOrario/') ?>",
                                type: "GET",
                                dataType: "JSON",
                                success: function (response)
                                {
                                    $('#nextId').val(response.data);
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data from ajax');
                                }
                            });


                            edit = 1;

                            //alert(edit);
                            var idCorso = $('#idCorso').val();
                            var dates = myDate.split(',');
                            $('.date').datepicker('setDate', dates);


                            var comboGiorno = new Array();
                            var giorno = $('#dateCorso').val();
                            comboGiorno = giorno.split(',');

                            $("#some_element").html("");

                            var i;
                            for (i = 0; i < comboGiorno.length; i++) {

                                var lunghezza = comboGiorno.length;
                                var whithColonna = (100 / lunghezza);
                                var gg = comboGiorno[i];

                                if (document.getElementById("sortable-row-" + gg)) {

                                    alert('Attenzione questa data ' + gg + ' è già presente');

                                } else {

                                    var co = "<button style='margin-top:20px;' type='button' class='btn btn-default btn-sm' onclick='addMoreRows(\"" + gg + "\");'><i class='fas fa-plus-circle'></i></button>";

                                    co += '<ul id="sortable-row-' + gg + '"></ul>';

                                    var myEle = document.getElementById("myElement");
                                    if (myEle) {
                                        var myEleValue = myEle.value;
                                    }

                                    var orariCorso = '<div style="border-top:4px solid #f0ad4e;width:' + whithColonna + '%;float:left;" class="form-inline">';
                                    orariCorso += '<input style="margin-top:20px;margin-left:10px;width:40%" name="giorno-' + comboGiorno[i] + '" type="text" class="form-control input-sm" value="' + comboGiorno[i] + '">';
                                    orariCorso += '<button style="margin-top:20px;margin-left:10px;" type="button" class="btn btn-danger btn-sm" onclick="giornoDelete(\'' + comboGiorno[i] + '\', ' + gruppo + ' )" style="margin-left:10px;">';
                                    orariCorso += '<span class="glyphicon glyphicon-trash" aria-hidden="true"  ></span>';
                                    orariCorso += '</button> ' + co;

                                    orariCorso += '</div>';

                                    jQuery('#some_element').append(orariCorso);
                                }
                            }


                            var addLi;

                            $.ajax({
                                url: "<?php echo site_url('corsi/getDateOrariByIdCorso/') ?>" + idCorso + '/' + gruppo,
                                type: "GET",
                                dataType: "JSON",
                                success: function (response)
                                {

                                    $.each(response.data, function (k, v) {

                                        //console.log(v.giorno);

                                        $.each(v.oraricorso, function (z, x) {

                                            addLi = '<li id=' + x.idOrariCorso + ' class="ui-state-default" style="list-style-type:none;width:80%;margin-left:10px;">' +
                                                    '<div style="width:100%;border:0px solid red; display: inline-block;vertical-align: top; margin-top: 15px;">' +
                                                    '<div style="margin: 1px; border: 0px solid green;" class="form-inline">' +
                                                    '<select name="orario" class="form-control input-sm"  style="width:60%" >' +
                                                    '<option selected>' + x.ora + '</option>' +
                                                    '<option>08:00</option>' +
                                                    '<option>08:30</option>' +
                                                    '<option>09:00</option>' +
                                                    '<option>09:30</option>' +
                                                    '<option>10:00</option>' +
                                                    '<option>10:30</option>' +
                                                    '<option>11:00</option>' +
                                                    '<option>11:30</option>' +
                                                    '<option>12:00</option>' +
                                                    '<option>12:30</option>' +
                                                    '<option>13:00</option>' +
                                                    '<option>13:30</option>' +
                                                    '<option>14:00</option>' +
                                                    '<option>14:30</option>' +
                                                    '<option>15:00</option>' +
                                                    '<option>15:30</option>' +
                                                    '<option>16:00</option>' +
                                                    '<option>16:30</option>' +
                                                    '<option>17:00</option>' +
                                                    '<option>17:30</option>' +
                                                    '<option>18:00</option>' +
                                                    '<option>18:30</option>' +
                                                    '<option>19:00</option>' +
                                                    '<option>19:30</option>' +
                                                    '<option>20:00</option>' +
                                                    '<option>20:30</option>' +
                                                    '<option>21:00</option>' +
                                                    '<option>21:30</option>' +
                                                    '</select>' +
                                                    //'</div>' +
                                                    // '<div id="div3" style="margin: 10px; display: inline-block; width:2%;border: 0px solid blue;vertical-align: top; margin-top: 12px;">' +
                                                    //'<a href="#" class="itemDelete" onclick="removeRowDb(' + x.idOrariCorso + ');"><span class="glyphicon glyphicon-trash" aria-hidden="true"  ></span></a>' +
                                                    '<button type="button" class="btn btn-danger btn-sm" onclick="removeRowDb(' + x.idOrariCorso + ');" style="margin-left:10px;">' +
                                                    '<span class="glyphicon glyphicon-trash" aria-hidden="true"  ></span>' +
                                                    '</button> ' +
                                                    '</div>' +
                                                    '<div style="margin-left: 0px;">' +
                                                    '<input style="margin-top:10px; width:60%" type="text"  name="ita" id="ita_' + x.idOrariCorso + '" value="' + x.titolo_ITA + '" class="form-control input-sm" placeholder="Italiano">' +
                                                    '</div>' +
                                                    '<div style="margin-left: 0px;">' +
                                                    '<input style="margin-top:10px; width:60%" type="text"  name="eng" id="eng_' + x.idOrariCorso + '" value="' + x.titolo_ENG + '" class="form-control input-sm" placeholder="Inglese">' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</li><hr style="margin-left:10px;border:1px solid #f0ad4e;width:45%;float:left; padding:0px;margin-top:10px; margin-bottom:0px;"></ul></div>';


                                            jQuery('#sortable-row-' + v.giorno).append(addLi);


                                        });


                                    });

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data from ajax');
                                }
                            });

                            $('#dateCorso').val(myDate);
                            $('#gruppo').val(gruppo);

                            $('#myModal').modal('show'); // show bootstrap modal
                        }


                        function corsoDelete(idCorso)
                        {
                            if (confirm('Attenzione stai cancellando un corso, cancellerai date e orari legati al medesimo corso, sei sicuro? '))
                            {
                                // ajax delete data to database
                                $.ajax({
                                    url: "<?php echo site_url('corsi/corsoDelete/') ?>" + idCorso,
                                    type: "POST",
                                    dataType: "JSON",
                                    success: function (data)
                                    {
                                        setTimeout(function () {
                                            window.location.href = '<?php echo site_url('corsi') ?>';
                                        }, 1000);
                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert('Error deleting data');
                                    }
                                });

                            }
                        }

                        function giornoDelete(giornotxt, gruppotxt)
                        {
                            if (confirm('Attenzione stai cancellando un giorno, cancellerai tutti gli orari legati al medesimo giorno, sei sicuro? '))
                            {
                                // ajax delete data to database
                                $.ajax({
                                    url: "<?php echo site_url('corsi/giornoDelete/') ?>",
                                    type: "POST",
                                    data: {
                                        idCorso: $('#idCorso').val(),
                                        giorno: giornotxt,
                                        gruppo: gruppotxt
                                    },
                                    dataType: "JSON",
                                    success: function (data)
                                    {

                                        setTimeout(function () {
                                            //window.location.href = '<?php echo site_url(); ?>';
                                            window.location.href = '<?php echo site_url('corsi/edit/') ?>' + $('#idCorso').val() + '/' + gruppotxt;
                                            // location.reload();
                                        }, 1000);

                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert('Error deleting data');
                                    }
                                });

                            }
                        }



                        function saveTheDateDelete(datetxt, gruppotxt)
                        {
                            if (confirm('Attenzione stai un gruppo di date, cancellerai tutti gli orari legati ai giorni, sei sicuro? '))
                            {
                                // ajax delete data to database
                                $.ajax({
                                    url: "<?php echo site_url('corsi/saveTheDateDelete/') ?>",
                                    type: "POST",
                                    data: {
                                        idCorso: $('#idCorso').val(),
                                        date: datetxt,
                                        gruppo: gruppotxt

                                    },
                                    dataType: "JSON",
                                    success: function (data)
                                    {

                                        setTimeout(function () {
                                            //window.location.href = '<?php echo site_url(); ?>';
                                            //window.location.href = '<?php echo site_url('corsi/edit/') ?>' + $('#idCorso').val() + '/' + gruppotxt;
                                            location.reload();
                                        }, 1000);


                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert('Error deleting data');
                                    }
                                });

                            }
                        }

                        $(document).ready(function () {

                            //italiano
                            CKEDITOR.replace('descrizione_ITA', {
                                customConfig: '<?php echo base_url('/assets/vendor/ckeditor/config_1.js'); ?>'
                            });

                            CKEDITOR.replace('programma_titolo_ITA', {
                                customConfig: '<?php echo base_url('/assets/vendor/ckeditor/config_1.js'); ?>'
                            });

                            //inglese
                            CKEDITOR.replace('descrizione_ENG', {
                                customConfig: '<?php echo base_url('/assets/vendor/ckeditor/config_1.js'); ?>'
                            });


                            CKEDITOR.replace('programma_titolo_ENG', {
                                customConfig: '<?php echo base_url('/assets/vendor/ckeditor/config_1.js'); ?>'
                            });



<?php
if ($gruppoModale != 0) {

    //$myDateModale[0]->myDate;
    ?>

                                editDate('<?php echo $myDateModale[0]->myDate; ?>', <?php echo $myDateModale[0]->gruppo; ?>)

<?php }
?>




                        });

    </script>

    <script src="<?php echo base_url('assets/vendor/bootstrap-toggle/js/bootstrap-toggle.min.js'); ?>"></script>


    <script>






                        $('.date').datepicker({
                            language: 'it',
                            multidate: true,
                            format: 'dd-mm-yyyy'
                        });

                        var rowCount = 0;


                        function addGiorni(frm) {

                            rowCount++;
                            var comboGiorno = new Array();
                            var giorno = $('#dateCorso').val();
                            comboGiorno = giorno.split(',');

                            var i;
                            for (i = 0; i < comboGiorno.length; i++) {

                                var gg = comboGiorno[i];

                                if (document.getElementById("sortable-row-" + gg)) {

                                    alert('Attenzione questa data ' + gg + ' è già presente');

                                } else {

                                    var lunghezza = comboGiorno.length;
                                    var whithColonna = (100 / lunghezza);

                                    var co = "<button type='button' class='btn btn-default btn-sm' onclick='addMoreRows(\"" + gg + "\");'><i class='fas fa-plus-circle'></i></button>";

                                    co += '<ul id="sortable-row-' + gg + '"></ul>';

                                    var myEle = document.getElementById("myElement");
                                    if (myEle) {
                                        var myEleValue = myEle.value;
                                    }

                                    var orariCorso = '<div style="width:' + whithColonna + '%;float:left;" class="form-inline" >';
                                    orariCorso += '<input style="width:50%" name="giorno-' + comboGiorno[i] + '" type="text" class="form-control input-sm" value="' + comboGiorno[i] + '">';
                                    orariCorso += '<button type="button" class="btn btn-danger btn-sm" onclick="giornoDelete(\'' + comboGiorno[i] + '\', ' + gruppo + ' )" style="margin-left:10px;">';
                                    orariCorso += '<span class="glyphicon glyphicon-trash" aria-hidden="true"  ></span>';
                                    orariCorso += '</button> ' + co;
                                    orariCorso += '</div>';

                                    jQuery('#some_element').append(orariCorso);

                                }

                            }
                        }



//                        function save()
//                        {
//                            
//                            $('#btnSave').text('saving...'); //change button text
//                            $('#btnSave').attr('disabled', true); //set button disable 
//
//                            var giorno = $('#dateCorso').val();
//                            comboGiorno = giorno.split(',');
//
//                            var selectedLanguage = new Array();
//
//
//                            if (edit === undefined) {
//                                alert('edi.... ' + edit);
//                                var i;
//                                for (i = 0; i < comboGiorno.length; i++) {
//
//                                    var gg = comboGiorno[i];
//
//                                    $('ul#sortable-row-' + gg + ' li').each(function () {
//                                        selectedLanguage.push($(this).parent("ul").attr("id") + '|' + $(this).find('option:selected').text() + '|' + $(this).find("input[name^='ita']").val() + '|' + $(this).find("input[name^='eng']").val());
//                                    });
//
//                                }
//
//                                var url = "<?php echo site_url('corsi/addDate') ?>";
//
//                            } else {
//                                alert('edi.... ' + edit);
//                                var i;
//                                for (i = 0; i < comboGiorno.length; i++) {
//
//                                    var gg = comboGiorno[i];
//
//                                    $('ul#sortable-row-' + gg + ' li').each(function () {
//                                        selectedLanguage.push($(this).parent("ul").attr("id") + '|' + $(this).attr('id') + '|' + $(this).find('option:selected').text() + '|' + $(this).find("input[name^='ita']").val() + '|' + $(this).find("input[name^='eng']").val());
//                                    });
//                                }
//
//                                var url = "<?php echo site_url('corsi/updateDate') ?>";
//                            }
//
//
//                            $.ajax({
//                                url: url,
//                                type: "POST",
//                                data: {
//                                    idCorso: $('#idCorso').val(),
//                                    gruppo: $('#gruppo').val(),
//                                    date: selectedLanguage
//                                },
//                                dataType: "json",
//                                success: function (result)
//                                {
//
//                                    if (result.validation) //if success close modal and reload ajax table
//                                    {
//                                        $('#modal_form').modal('hide');
////                                        setTimeout(function () {
////                                            location.reload();
////                                        }, 500);
//                                    } else {
//                                        //$('#modal_form').modal('hide');
//                                        alert(result.message);
//                                    }
//                                    $('#btnSave').text('save'); //change button text
//                                    $('#btnSave').attr('disabled', false); //set button enable 
//
//                                },
//                                error: function (jqXHR, textStatus, errorThrown)
//                                {
//                                    alert('Error adding / update data');
//                                    $('#btnSave').text('save'); //change button text
//                                    $('#btnSave').attr('disabled', false); //set button enable 
//                                }
//                            });
//
//
//
//
//
//
//
//                        }


                        function save()
                        {

                            if ($('#gruppo').val() !== '') {
                                saveUpdate();
                                return false;

                            }

                            // alert('fermati');


                            $('#btnSave').text('saving...'); //change button text
                            $('#btnSave').attr('disabled', true); //set button disable 

                            var giorno = $('#dateCorso').val();
                            comboGiorno = giorno.split(',');

                            var selectedLanguage = new Array();

                            var i;
                            for (i = 0; i < comboGiorno.length; i++) {

                                var gg = comboGiorno[i];

                                $('ul#sortable-row-' + gg + ' li').each(function () {
                                    selectedLanguage.push($(this).parent("ul").attr("id") + '|' + $(this).find('option:selected').text() + '|' + $(this).find("input[name^='ita']").val() + '|' + $(this).find("input[name^='eng']").val());
                                });

                            }

                            var url = "<?php echo site_url('corsi/addDate') ?>";

                            $.ajax({
                                url: url,
                                type: "POST",
                                data: {
                                    idCorso: $('#idCorso').val(),
                                    gruppo: $('#gruppo').val(),
                                    date: selectedLanguage
                                },
                                dataType: "json",
                                success: function (result)
                                {

                                    if (result.validation) //if success close modal and reload ajax table
                                    {
                                        $('#modal_form').modal('hide');
                                        setTimeout(function () {
                                            location.reload();
                                        }, 500);
                                    } else {
                                        //$('#modal_form').modal('hide');
                                        alert(result.message);
                                    }
                                    $('#btnSave').text('save'); //change button text
                                    $('#btnSave').attr('disabled', false); //set button enable 

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error adding / update data');
                                    $('#btnSave').text('save'); //change button text
                                    $('#btnSave').attr('disabled', false); //set button enable 
                                }
                            });

                        }



                        function saveUpdate()
                        {

                            $('#btnSave').text('saving...'); //change button text
                            $('#btnSave').attr('disabled', true); //set button disable 

                            var giorno = $('#dateCorso').val();
                            comboGiorno = giorno.split(',');

                            var selectedLanguage = new Array();

                            var i;
                            for (i = 0; i < comboGiorno.length; i++) {

                                var gg = comboGiorno[i];

                                $('ul#sortable-row-' + gg + ' li').each(function () {
                                    selectedLanguage.push($(this).parent("ul").attr("id") + '|' + $(this).attr('id') + '|' + $(this).find('option:selected').text() + '|' + $(this).find("input[name^='ita']").val() + '|' + $(this).find("input[name^='eng']").val());
                                });
                            }

                            var url = "<?php echo site_url('corsi/updateDate') ?>";

                            console.log(selectedLanguage.toString());

                            $.ajax({
                                url: url,
                                type: "POST",
                                data: {
                                    idCorso: $('#idCorso').val(),
                                    gruppo: $('#gruppo').val(),
                                    date: selectedLanguage
                                },
                                dataType: "json",
                                success: function (result)
                                {

                                    if (result.validation) //if success close modal and reload ajax table
                                    {
                                        $('#modal_form').modal('hide');
                                        setTimeout(function () {
                                            location.reload();
                                        }, 500);
                                    } else {
                                        //$('#modal_form').modal('hide');
                                        alert(result.message);
                                    }
                                    $('#btnSave').text('save'); //change button text
                                    $('#btnSave').attr('disabled', false); //set button enable 

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error adding / update data');
                                    $('#btnSave').text('save'); //change button text
                                    $('#btnSave').attr('disabled', false); //set button enable 
                                }
                            });







                        }







                        function addMoreRows(giorno) {

                            rowCount++;


                            var greatId = Math.max.apply(null, $('ul li').each(function (i)
                            {
                                $(this).attr('id'); // This is your rel value
                            }));


//                                var greatId = Math.max.apply(null, $('#sortable-row-' + giorno + ' li').map(function () {
//                                    return $(this).attr('id');
//                                }));
//                                
//                                if (isFinite(greatId) == false) {
//                                    greatId = 0;
//                                }


                            if ($('#nextId').val() !== "") {

                                var newId = $('#nextId').val();

                            } else {

                                var greatId = Math.max.apply(null, $('ul li').map(function ()
                                {
                                    return $(this).attr('id'); // This is your rel value
                                }));

                                var newId = parseInt(greatId) + 1;
                            }

                            // alert(newId);

                            var addLi = '<li id=' + newId + ' class="ui-state-default" style="list-style-type:none;width:80%;margin-left:10px;">' +
                                    '<div style="width:100%;border:0px solid red; display: inline-block;vertical-align: top; margin-top: 15px;">' +
                                    '<div style="margin: 1px; border: 0px solid green;" class="form-inline">' +
                                    '<select name="orario" class="form-control input-sm" style="width:60%">' +
                                    '<option>08:00</option>' +
                                    '<option>08:30</option>' +
                                    '<option>09:00</option>' +
                                    '<option>09:30</option>' +
                                    '<option>10:00</option>' +
                                    '<option>10:30</option>' +
                                    '<option>11:00</option>' +
                                    '<option>11:30</option>' +
                                    '<option>12:00</option>' +
                                    '<option>12:30</option>' +
                                    '<option>13:00</option>' +
                                    '<option>13:30</option>' +
                                    '<option>14:00</option>' +
                                    '<option>14:30</option>' +
                                    '<option>15:00</option>' +
                                    '<option>15:30</option>' +
                                    '<option>16:00</option>' +
                                    '<option>16:30</option>' +
                                    '<option>17:00</option>' +
                                    '<option>17:30</option>' +
                                    '<option>18:00</option>' +
                                    '<option>18:30</option>' +
                                    '<option>19:00</option>' +
                                    '<option>19:30</option>' +
                                    '<option>20:00</option>' +
                                    '<option>20:30</option>' +
                                    '<option>21:00</option>' +
                                    '<option>21:30</option>' +
                                    '</select>' +
                                    '<button type="button" class="btn btn-danger btn-sm" onclick="removeRow(' + newId + ');" style="margin-left:10px;">' +
                                    '<span class="glyphicon glyphicon-trash" aria-hidden="true"  ></span>' +
                                    '</button> ' +
                                    '</div>' +
                                    '<div style="margin-left: 0px;">' +
                                    '<input style="margin-top:10px; width:60%"  type="text"  name="ita" id="ita_' + newId + '" class="form-control input-sm" placeholder="Italiano">' +
                                    '</div>' +
                                    '<div style="margin-left: 0px;">' +
                                    '<input style="margin-top:10px; width:60%"  type="text"  name="eng" id="eng_' + newId + '" class="form-control input-sm" placeholder="Inglese">' +
                                    '</div>' +
                                    '</div>' +
//                                    '<div id="div3" style="margin: 10px; display: inline-block; width:2%;border: 0px solid blue;vertical-align: top; margin-top: 12px;">' +
//                                    '<a href="#" class="itemDelete" onclick="removeRow(' + newId + ');"><i class="fa fa-trash fa-2x" style ="cursor: pointer;"  aria-hidden="true"  ></i></a>' +
//                                    '</div>' +
                                    '</li></ul></div>';


                            jQuery('#sortable-row-' + giorno).append(addLi);
                            $('#nextId').val('');
                        }


                        function removeRow(id) {
                            if (confirm('Sei sicuro di voler cancellare questo orario?'))
                                $('#' + id).remove();

                        }


                        function removeRowDb(removeNum) {

                            //alert(removeNum);     
                            if (confirm('Sei sicuro di voler cancellare questo orario?'))
                            {

//                                            jQuery('#rowCount' + removeNum).remove();
//                                            rowCount--;
                                $('#' + removeNum).remove();

                                // ajax delete data to database
                                $.ajax({
                                    url: "<?php echo site_url('corsi/orarioDelete/') ?>/" + removeNum,
                                    type: "POST",
                                    dataType: "JSON",
                                    success: function (data)
                                    {

                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert('Error deleting data');
                                    }
                                });

                            }

                        }


                        //############# NUOVE FUNZIONI
                        function editDate_1(gruppo)
                        {
                          window.location.href = '<?php echo site_url('corsi/dateCorso/') ?>' + <?php echo $corso[0]->id; ?>  + '/' + gruppo;

                        }







    </script>




</html>
