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

            #sortable-row li { margin-bottom:4px; padding:0px;cursor:move;}
            #sortable-row li.ui-state-highlight { height: 0em;border:#ccc 2px dotted;
                                                  list-style-position:inside;
                                                  margin:0;
                                                  padding:0;}
            </style>



        </head>

        <body>




            <div id="wrapper">

            <?php $this->view('menu'); ?>



            <form role="form" method="post" action="<?php echo site_url('corsi/setCorso/')?>" name="modulo" >  
                <div id="page-wrapper">
                    <div class="row">
                        <div class="col-lg-12">

                            <!--<button type="submit"  id="btnSave"  fa-calendar style="float:right;margin-top: 10px;" class="btn btn-primary">Salva per aggiungere le date corso</button>-->
                            <button type="button" onclick="validatorForm();" id="btnSave"  fa-calendar style="float:right;margin-top: 10px;" class="btn btn-primary">Salva per aggiungere le date corso</button>

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

                                        <input type="hidden" name="idCorso" id="idCorso" value="">

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
                                                        <input class="form-control input-sm" name="titolo_ITA" id="titolo_ITA">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Sottotitolo ITA</label>
                                                        <input class="form-control input-sm" name="sottotitolo_ITA" placeholder="Enter text" id="sottotitolo_ITA">
                                                    </div>
                                                </div>

                                                <div class="form-group " >
                                                    <label>Descrizione ITA</label>
                                                    <textarea class="form-control" id="descrizione_ITA" name="descrizione_ITA" rows="2"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Programma ITA</label>
                                                    <textarea class="form-control" id="programma_titolo_ITA" name="programma_titolo_ITA" rows="2"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Programma footer ITA</label>
                                                    <input class="form-control input-sm" name="programma_footer_ITA" id="programma_footer_ITA">
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Incluso ITA</label>
                                                        <input class="form-control input-sm" name="incluso_ITA" id="incluso_ITA">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Escluso ITA</label>
                                                        <input class="form-control input-sm" name="escluso_ITA" id="escluso_ITA">
                                                    </div>
                                                </div>









                                            </div>

                                            <div class="tab-pane fade" id="inglese">
                                                <!--                                    <h4>Profile Tab</h4>-->
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Titolo ENG</label>
                                                        <input class="form-control input-sm" name="titolo_ENG" id="titolo_ENG">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Sottotitolo ENG</label>
                                                        <input class="form-control input-sm" name="sottotitolo_ENG" id="sottotitolo_ENG">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Descrizione ENG</label>
                                                    <textarea class="form-control" id="descrizione_ENG" name="descrizione_ENG" rows="2"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Programma ENG</label>
                                                    <textarea class="form-control" id="programma_titolo_ENG" name="programma_titolo_ENG" rows="2"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Programma footer ENG</label>
                                                    <input class="form-control input-sm" name="programma_footer_ENG" id="programma_footer_ENG">
                                                </div>



                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Incluso ENG</label>
                                                        <input class="form-control input-sm" name="incluso_ENG" id="incluso_ENG">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Escluso ENG</label>
                                                        <input class="form-control input-sm" name="escluso_ENG" id="escluso_ENG">
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
                                        <input type="number" value="0.00"  min="0.01" step="0.01" class="form-control input-sm" data-number-to-fixed="2"  class="currency" name="prezzo" id="prezzo" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Aula</label>
                                        <select class="form-control input-sm" name="aula_id" id="aula_id">
                                            <option value="">Seleziona Aula</option>
                                            <?php foreach ($aula as $item): ?>
                                                <option value="<?php echo $item->id; ?>"><?php echo $item->nome_ITA; ?></option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Categoria</label>
                                        <select class="form-control input-sm" name="categoria_id" id="categoria_id">
                                            <option value="" >Seleziona Categoria</option>
                                            <?php foreach ($categoria as $item): ?>
                                                <option value="<?php echo $item->id; ?>"><?php echo $item->nome_ITA; ?></option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>Rivolto a:</label>
                                        <select class="form-control input-sm" name="destinatario_id" id="destinatario_id">
                                            <option value="">Seleziona Destinatari</option>
                                            <?php foreach ($destinatari as $item): ?>
                                                <option value="<?php echo $item->id; ?>"><?php echo $item->nome_ITA; ?></option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label>Num. Partecipanti Min</label>
                                        <select class="form-control input-sm" name="numeroPartecipantiMin" id="numeroPartecipantiMin" >
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                            <option>14</option>
                                            <option>15</option>
                                            <option>16</option>
                                            <option>17</option>
                                            <option>18</option>
                                            <option>19</option>
                                            <option>20</option>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>Num. Partecipanti Max</label>
                                        <select class="form-control input-sm" name="numeroPartecipantiMax" id="numeroPartecipantiMax">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                            <option>14</option>
                                            <option>15</option>
                                            <option>16</option>
                                            <option>17</option>
                                            <option>18</option>
                                            <option>19</option>
                                            <option>20</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Num. Partecipanti Overbooking</label>
                                        <select class="form-control input-sm" name="numeroPartecipantiOverbooking" id="numeroPartecipantiOverbooking">
                                            <option>1</option>
                                            <option>2</option>
                                            <option selected>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
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
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>




                                    <div class="form-group col-md-3">
                                        <label style="margin-top:30px;">Shooting</label>
                                        <input type="checkbox"  checked data-toggle="toggle" data-size="mini" name="shooting" id="shooting">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label style="margin-top:30px;">Intern.</label>
                                        <input type="checkbox" checked data-toggle="toggle" data-size="mini"  name="internazionale" id="internazionale">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Trainer</label>
                                        <select class="form-control input-sm" name="trainer_id" id="trainer_id">
                                            <option value="">Seleziona Trainer</option>
                                            <?php foreach ($trainer as $item): ?>
                                                <option value="<?php echo $item->id; ?>"><?php echo $item->cognome . " " . $item->nome; ?></option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="margin-top:30px;">Mostra Trainer</label>
                                        <input type="checkbox"  checked data-toggle="toggle" data-size="mini" name="mostraTrainer" id="mostraTrainer">
                                    </div>

                                    <div class="form-group col-md-2">

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





                                function validatorForm()
                                {
                                    
                                    
                                    var messaggio = "";
                                    if ($("#titolo_ITA").val() === '' || $("#titolo_ITA").val() === undefined) {
                                             alert("Seleziona l'aula del corso");
                                             return false;
                                    }

                                    if ($("#aula_id").val() === '' || $("#aula_id").val() === undefined) {
                                             alert("Seleziona l'aula del corso");
                                             return false;
                                    }
                                    if ($("#categoria_id").val() === '' || $("#categoria_id").val() === undefined) {
                                            alert("Seleziona la categoria del corso");
                                             return false;
                                    }

                                    if ($("#destinatario_id").val() === '' || $("#destinatario_id").val() === undefined) {
                                            alert("Seleziona i destinatari del corso");
                                             return false;
                                    }
                                   
                                   
                                    if ($("#trainer_id").val() === '' || $("#trainer_id").val() === undefined) {
                                            alert("Seleziona il trainer del corso");
                                             return false;
                                    }
                                    
                                    document.modulo.submit();

                                }













                                function giorniCorsoAdd()
                                {



                                //$('#checkboxTipologia').bootstrapToggle('off');

                                $('#sortable-row').empty();
                                save_method = 'add';
                                $('#form')[0].reset(); // reset form on modals
                                $('.form-group').removeClass('has-error'); // clear error class
                                $('.help-block').empty(); // clear error string
                                $('#modal_form').modal('show'); // show bootstrap modal
                                $('.modal-title').text('Inserisci giorni'); // Set Title to Bootstrap modal title

                                }






                                function corsoDel(idCorso)
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
                                        location.reload();
                                        }, 1000)
                                        },
                                        error: function (jqXHR, textStatus, errorThrown)
                                        {
                                        alert('Error deleting data');
                                        }
                                });
                                }
                                }


                                function corsoEdit(idCorso)
                                {
                                document.location.href = '<?php echo site_url('corsi/edit/'); ?>' + idCorso;
                                }



                                function selectPost()
                                {
                                document.modulo.method = "post";
                                document.modulo.action = "<?php $_SERVER['PHP_SELF']; ?>";
                                document.modulo.submit();
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
                                });
        </script>

        <script src="<?php echo base_url('assets/vendor/bootstrap-toggle/js/bootstrap-toggle.min.js'); ?>"></script>



        <script>


                                $('.date').datepicker({
                                multidate: true,
                                        format: 'dd-mm-yyyy'
                                });
                                var rowCount = 0;
//                                                function combo(id, obj)
//                                                {
//
//                                                    var lunghezza = obj.length;
//                                                    var whithColonna = (100 / lunghezza);
//
//                                                    alert(whithColonna);
//
//                                                    var co = '<button type="button" class="btn btn-default" onclick="addMoreRows();">Aggiungi Risposta</button>';
//                                                    co += '<ul id="sortable-row"></ul>';
//
//
//
//
//                                                    jQuery('#some_element').append('<div style="width:' + whithColonna + '%;float:left "><select id="' + id + '"></select>cc' + co + 'mm</div>');
//                                                    jQuery.each(obj, function (val, text) {
//
//                                                        jQuery('<option>-----</option').val('').html('');
//                                                        jQuery('#' + id).prepend(
//                                                                jQuery('<option></option').val(val).html(text)
//                                                                );
//                                                    });
//                                                }
//
//
//
//            function combo1(id, obj)
//            {
//
//
////                                       jQuery.each(obj, function (val, text) {
////
////                                        jQuery('<option>-----</option').val('').html('');
////                                        jQuery('#' + id).prepend(
////                                                jQuery('<option></option').val(val).html(text)
////                                                );
////                                    });
//            }


                                function addGiorni(frm) {
                                rowCount++;
                                var comboGiorno = new Array();
                                var giorno = $('#dateCorso').val();
                                comboGiorno = giorno.split(',');
                                var i;
                                for (i = 0; i < comboGiorno.length; i++) {

                                var lunghezza = comboGiorno.length;
                                var whithColonna = (100 / lunghezza);
                                var gg = comboGiorno[i];
                                var co = "<button type='button' class='btn btn-default' onclick='addMoreRows(\"" + gg + "\");'>Add Orari</button>";
                                co += '<ul id="sortable-row-' + gg + '" ></ul>';
                                var myEle = document.getElementById("myElement");
                                if (myEle) {
                                var myEleValue = myEle.value;
                                }

                                jQuery('#some_element').append('<div style="width:' + whithColonna + '%;float:left "><input name="giorno-' + comboGiorno[i] + '" type="text" value="' + comboGiorno[i] + '">' + co + 'mm</div>');
                                }
                                }











                                function save()
                                {






                                $('#btnSave').text('saving...'); //change button text
                                $('#btnSave').attr('disabled', true); //set button disable 

                                var giorno = $('#dateCorso').val();
                                comboGiorno = giorno.split(',');
                                var selectedLanguage = new Array();
                                var i;
                                for (i = 0; i < comboGiorno.length; i++) {

                                var a = comboGiorno[i];
                                var gg = comboGiorno[i];
                                $('ul#sortable-row-' + gg + ' li').each(function () {
                                // alert('label____input: ' + $(this).find("input").val());
                                // alert('orario____option: ' + $(this).find('option:selected').text());
                                //alert('ul_id: ' + $(this).parent("ul").attr("id"));
                                selectedLanguage.push($(this).parent("ul").attr("id") + '|' + $(this).find('option:selected').text() + '|' + $(this).find("input").val());
                                });
                                }

                                console.log(selectedLanguage.toString());
                                $.ajax({
                                url: "<?php echo site_url('corsi/addDate') ?>",
                                        type: "POST",
                                        data: {
                                        idCorso: $('#idCorso').val(),
                                                date: selectedLanguage
                                        },
                                        dataType: "json",
                                        success: function (validation)
                                        {

                                        if (validation) //if success close modal and reload ajax table
                                        {
                                        $('#modal_form').modal('hide');
                                        setTimeout(function () {
                                        location.reload();
                                        }, 500);
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
                                var greatId = Math.max.apply(null, $('#sortable-row-' + giorno + ' li').map(function () {
                                return $(this).attr('id');
                                }));
                                if (isFinite(greatId) == false) {
                                greatId = 0;
                                }

                                var newId = parseInt(greatId) + 1;
                                var addLi = '<li id=' + newId + ' class="ui-state-default" style="list-style-type:none;">' +
                                        '<div style="border:2px solid red; display: inline-block;vertical-align: top; margin-top: 15px;">' +
                                        '<div style="margin: 0px; border: 4px solid red;float:left">' +
                                        '<select name="orario_">' +
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
                                        '</div>' +
                                        '<div style="float:left;margin-left: 0px;">' +
                                        '<input type="text"  name="programma" id="programma" class="form-control">' +
                                        '</div>' +
                                        '</div>' +
                                        '<div id="div3" style="margin: 10px; display: inline-block; width:2%;border: 0px solid blue;vertical-align: top; margin-top: 12px;">' +
                                        '<a href="#" class="itemDelete"><i class="fa fa-trash fa-2x" style ="cursor: pointer;"  aria-hidden="true"  ></i></a>' +
                                        '</div>' +
                                        '</li></ul></div>';
                                jQuery('#sortable-row-' + giorno).append(addLi);
                                }

                                function removeRow(removeNum) {

//                                jQuery('#rowCount' + removeNum).remove();
//                                rowCount--;
                                $(this).parent().remove();
                                }
        </script>



















    </body>

</html>
