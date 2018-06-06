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
<!--        <link href="<?php echo base_url('assets/css/plugins/iCheck/custom.css'); ?>" rel="stylesheet">-->
        <link href="<?php echo base_url('assets/css/animate.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/plugins/select2/select2.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/plugins/datapicker/datepicker3.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css'); ?>" rel="stylesheet">


    </head>

    <body>

        <div id="wrapper">

            <?php $this->view('menu_sx'); ?>
            <div id="page-wrapper" class="gray-bg">

                <?php $this->view('menu_top'); ?>

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Inserisci Nuovo Articolo - Step 3</h2>
                        <!--                        <ol class="breadcrumb">
                                                    <li>
                                                        <a href="index.html">Home</a>
                                                    </li>
                                                    <li>
                                                        <a>Tables</a>
                                                    </li>
                                                    <li class="active">
                                                        <strong>Static Tables</strong>
                                                    </li>
                                                </ol>-->
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
                <!--                <div class="wrapper wrapper-content animated fadeInRight">-->
                <div class="wrapper wrapper-content">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">

                                    <?php
                                    echo "--->" . $trovato . "<---";



                                    switch ($trovato) {
                                        case "PRIMA VOLTA":
                                            echo "prima volta";
                                            break;
                                        case "NON TROVATO":
                                            echo "LIBRO NON TROVATO!";
                                            break;
                                        case "TROVATO":
                                            echo "LIBRO TROVATO";
                                            break;
                                    }
                                    ?>                             




                                    <h5>Seleziona distributore e inserisci documento di carico</h5>

                                </div>
                                <!--                                -->


                                <div class="ibox-content" >
                                    <div class="row">

                                        <form  method="post" name ="modulo" action="<?php echo site_url('magazzino/inserisciNuovoStep3') ?>">

                                            <input type="hidden"   name="trovato" id="trovato"  value="<?php echo $trovato; ?>">

                                            <div class="form-row" >
                                                <div class="form-group col-md-3">
                                                    <label for="isbn">Isbn</label>
                                                    <input type="text" class="form-control input-sm" id="isbn" name="isbn"  value="<?php echo (isSet($contenuto) ? $contenuto[0]->isbn : ''); ?>" autofocus placeholder="Isbn">
                                                </div>

                                                <div class="form-group col-md-3">
                                                </div>
                                                <div class="form-group col-md-3">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="idDistributore">Totale €</label>
                                                    <input type="text"  readonly class="form-control input-sm" id="totalePrezzoDocumentoCarico" name="totalePrezzoDocumentoCarico" value="<?php echo $totalePrezzoDocumentoCarico ?>">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="idContenutoTipo">Tipo Documento</label>
                                                    <input type="text" readonly class="form-control  input-sm" id="contenutoTipo" value="<?php echo $contenutoTipo[0]->tipo; ?>">
                                                    <input type="hidden"  class="form-control input-sm" name="idContenutoTipo" id="idContenutoTipo"  value="<?php echo $contenutoTipo[0]->id; ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="idDistributore">Fornitore</label>

                                                    <input type="text"  readonly class="form-control input-sm" value="<?php echo $distributore[0]->nome; ?>">
                                                    <input type="hidden"  class="form-control input-sm" name="idDistributore" id="idDistributore" value="<?php echo $distributore[0]->id; ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="documentoCarico">Documento di Carico</label>
                                                    <input type="text" readonly class="form-control input-sm" name="documentoCarico" id="documentoCarico" value="<?php echo $documentoCarico; ?>" >
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="dataCarico">Data di Carico</label>
                                                    <input type="text" readonly class="form-control input-sm" name="dataCarico" id="dataCarico"  value="<?php echo $dataCarico; ?>" >
                                                </div>
                                            </div>



                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="titolo">Titolo</label>
                                                    <input type="text" class="form-control input-sm" id="titolo"  value="<?php echo (isSet($contenuto) ? $contenuto[0]->titolo : ''); ?>" placeholder="Titolo">
                                                </div>



                                                <div class="form-group col-md-3">
                                                    <!--<div style="vertical-align: bottom;display: inline-block;width: 89%;">-->
                                                    <label for="autore">Autore</label><br>
                                                    <?php if ($trovato == "TROVATO") { ?>

                                                        <input type="text" class="form-control input-sm" id="autore"  value="<?php echo (isSet($contenuto) ? $contenuto[0]->autore : ''); ?>">

                                                    <?php } else { ?>
                                                        <select class="select2_demo_autore form-control"  name="autore" id="autore" style="width: 87%">
                                                            <option></option>
                                                            <?php
                                                            foreach ($autori as $item):
                                                                ?>
                                                                <option value="<?php echo $item->id; ?>" data-tokens="<?php echo $item->nome; ?>"  ><?php echo $item->nome; ?></option>
                                                                <?php
                                                            endforeach;
                                                            ?>
                                                        </select>

                                                        <!--                                                        <div style="vertical-align: bottom;display: inline-block;">
                                                        -->                                                           


                                                                                                                        <button style="height:30px;margin-bottom: 0px;" type="button" class="btn btn-default btn-sm" onclick="autoreAdd()">
                                                                                                                        <span class="glyphicon glyphicon-plus " aria-hidden="true"></span>
                                                                                                                       </button>

                                                        <!--
                                                                                                                </div>
                                                                                                            </div>-->
                                                        <!--                                                    <div class="clear"></div>-->

                                                    <?php } ?>
                                                </div>




                                                <div class="form-group col-md-3">
                                                    <!--                                                <div style="width: 89%;border:0px solid #005f8d;vertical-align: bottom;">-->
                                                    <label for="inputPassword4">Editore</label><br>

                                                    <?php if ($trovato == "TROVATO") { ?>

                                                        <input type="text" class="form-control input-sm" id="editore" value="<?php echo (isSet($contenuto) ? $contenuto[0]->casa_editrice : ''); ?>" placeholder="Editore">

                                                    <?php } else { ?>

                                                        <select class="select2_demo_casa_editrice form-control"  name="editore" id="editore" style="width: 87%">
                                                            <option></option>
                                                            <?php
                                                            foreach ($casaEditrice as $item):
                                                                ?>
                                                                <option value="<?php echo $item->id; ?>" data-tokens="<?php echo $item->nome; ?>"  ><?php echo $item->nome; ?></option>
                                                                <?php
                                                            endforeach;
                                                            ?>
                                                        </select>



                                                        <!--                                                    <div style="border:0px solid #090;vertical-align: bottom;display: inline-block;">
                                                        -->                                                                                                           



                                                        <button style="height:30px;margin-bottom: 0px;" type="button" class="btn btn-default btn-sm" onclick="casaEditriceAdd()">
                                                            <span class="glyphicon glyphicon-plus " aria-hidden="true"></span>
                                                        </button>



                                                        <!--
                                                                                                                                                                </div>-->
                                                        <!--                                                        </div>
                                                                                                            <div class="clear"></div>
                                                        
                                                        -->

                                                    <?php } ?>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="inputPassword4">Anno Pubblicazione</label>
                                                    <input type="text" class="form-control input-sm" id="annoPubblicazione" value="<?php echo (isSet($contenuto) ? $contenuto[0]->edizione : ''); ?>" placeholder="Anno Pubblicazione">
                                                </div>
                                            </div>




                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="titolo">Prezzo</label>
                                                    <input type="text" class="form-control input-sm" id="prezzo" value="<?php echo (isSet($contenuto) ? $contenuto[0]->prezzo : ''); ?>" placeholder="Prezzo">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="quantitaTotali" id="labelQuantitaTotali">Quantità totali</label>
                                                    <input type="text" class="form-control input-sm" id="quantitaTotali" value=""  placeholder="Quantità totali">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="percentualeSconto" id="labelPercentualeSconto">Percentuale di Sconto</label>
    <!--                                                <input type="text" class="form-control input-sm" id="percentualeSconto" placeholder="Percentuale di Sconto">
                                                    -->
                                                    <select class="select2_demo_4 form-control"  name="percentualeSconto" id="percentualeSconto" style="width:100%">
                                                        <option></option>
                                                        <?php
                                                        foreach ($percentuale as $item):
                                                            ?>
                                                            <option value="<?php echo $item->name; ?>" data-tokens="<?php echo $item->name; ?>%"  ><?php echo $item->name; ?>%</option>
                                                            <?php
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="titolo" id="labelNumeroCopieOmaggio">Numero Copie Omaggio</label>
                                                    <input type="text" class="form-control input-sm" id="numeroCopieOmaggio" placeholder="Numero Copie Omaggio">
                                                </div>
                                            </div>







                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="quantitaTotali" id="labelIdTipoPresaInCarico">Tipo Presa in Carico</label>
                                                    <select class="select2_demo_3 form-control"  name="idTipoPresaInCarico"   id="idTipoPresaInCarico" style="width:100%">

                                                        <option></option>
                                                        <?php
                                                        foreach ($tipoPresaInCarico as $item):
                                                            ?>
                                                            <option value="<?php echo $item->id; ?>" data-tokens="<?php echo $item->nome; ?>"  ><?php echo $item->nome; ?></option>
                                                            <?php
                                                        endforeach;
                                                        ?>
                                                    </select>

                                                </div>



                                                <div class="form-group col-md-3">
                                                    <label for="inputPassword4">Codice Sap</label>
                                                    <input type="text" class="form-control input-sm" id="codiceSap" placeholder="Codice Sap">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="inputPassword4">Novità</label>
                                                    <input type="checkbox" class="form-control input-sm"  value="">
                                                </div>
                                            </div>








                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <?php if (isSet($contenuto) && $contenuto[0]->image != "") { ?>

                                                        <img src="<?php echo $contenuto[0]->image; ?>" style="width: 90px;">

                                                    <?php } else { ?>

                                                        <label for="descrizione">Immagine</label>

                                                    <?php } ?>


                                                    <label class="btn btn-primary">
                                                        Browse&hellip; <input type="file" name="userfile" id="userfile" style="display: none;">
                                                    </label>


                                                </div>


                                                <div class="form-group col-md-6">
                                                    <label for="descrizione">Descrizione Web</label>
                                                    <textarea class="form-control" rows="5" id="descrizione"><?php echo (isSet($contenuto) ? $contenuto[0]->descrizione_web : ''); ?></textarea>
                                                </div>


                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <button class="btn btn-white" type="submit">Cancel</button>
                                                    <button class="btn btn-primary" type="button" onclick="saveCaricaMagazzino();">Salva Articolo</button>

                                                </div>
                                            </div>

                                            <!--                                        <button type="submit" class="btn btn-primary">Sign in</button>-->





                                        </form>    

                                    </div>
                                </div>

                                <!--                                
                                                                
                                                                
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
                                <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js'); ?>"></script><!--
                        
                         Peity 
                        <script src="<?php echo base_url('assets/js/plugins/peity/jquery.peity.min.js'); ?>"></script>-->

                                <!-- Custom and plugin javascript -->
                                <script src="<?php echo base_url('assets/js/inspinia.js'); ?>"></script>
                                <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js'); ?>"></script>

                                <!--         iCheck 
                                        <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>"></script>
                                
                                         Peity 
                                        <script src="<?php echo base_url('assets/js/demo/peity-demo.js'); ?>"></script>-->


                                <!-- Data picker -->
                                <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js'); ?>"></script>
                                <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.it.min.js'); ?>"></script>

                                <!-- Select2 -->
                                <script src="<?php echo base_url('assets/js/plugins/select2/select2.full.min.js'); ?>"></script>

                                <!-- Toastr script -->
                                <script src="<?php echo base_url('assets/js/plugins/toastr/toastr.min.js'); ?>"></script>



                                <form action="#" id="form" class="form-horizontal">
                                    <div class="modal inmodal fade" id="myModal_casaEditrice" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <input type="hidden" class="form-control" id="idCasaEditrice" name="idAutore">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h2 class="modal-title">Nuovo Distributore</h2>
                                                </div>
                                                <div class="modal-body" style="height:240px">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">Nominativo</label>
                                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nominativo">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">Descrizione</label>
                                                            <input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="Descrizione">
                                                        </div>

                                                    </div>                                             
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="btnSave" onclick="saveCasaEditrice()">Save changes</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>    
                                </form>






                                <form action="#" id="form" class="form-horizontal">
                                    <div class="modal inmodal fade" id="myModal_autore" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <input type="hidden" class="form-control" id="idAutore" name="idAutore">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h2 class="modal-title">Nuovo Distributore</h2>
                                                </div>
                                                <div class="modal-body" style="height:240px">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">Nominativo</label>
                                                            <input type="text" class="form-control" id="nomeAutore" name="nomeAutore" placeholder="Nominativo">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">Descrizione</label>
                                                            <input type="text" class="form-control" id="descrizioneAutore" name="descrizioneAutore" placeholder="Descrizione">
                                                        </div>

                                                    </div>                                             
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="btnSave" onclick="saveAutore()">Save changes</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>    
                                </form>   







































                                <script>
                                    var save_method;
                                    function autoreAdd()
                                    {
                                        $('#form')[0].reset(); // reset form on modals
                                        $('.modal-title').text('Aggiungi Autore');
                                        $('#myModal_autore').modal('show'); // show bootstrap modal
                                    }



                                    function casaEditriceAdd()
                                    {
                                        $('#form')[0].reset(); // reset form on modals
                                        $('.modal-title').text('Aggiungi Editore'); // Set title to Bootstrap modal title

                                        $('#myModal_casaEditrice').modal('show'); // show bootstrap modal
                                    }



                                    function saveCasaEditrice()
                                    {
                                        $('#btnSave').text('saving...'); //change button text
                                        $('#btnSave').attr('disabled', true); //set button disable 

                                        var url;

                                        url = "<?php echo site_url('magazzino/casaEditriceAdd') ?>";


                                        // ajax adding data to database
                                        $.ajax({
                                            url: url,
                                            type: "POST",
                                            data: {
                                                idAutore: $('#idCasaEditrice').val(),
                                                nome: $('#nome').val(),
                                                descrizione: $('#descrizione').val()

                                            },
                                            dataType: "json",
                                            success: function (validation)
                                            {
                                                if (validation) //if success close modal and reload ajax table
                                                {
                                                    $('#myModal_casaEditrice').modal('hide');
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



                                    function saveAutore()
                                    {
                                        $('#btnSave').text('saving...'); //change button text
                                        $('#btnSave').attr('disabled', true); //set button disable 

                                        var url;

                                        url = "<?php echo site_url('magazzino/autoreAdd') ?>";

                                        // ajax adding data to database
                                        $.ajax({
                                            url: url,
                                            type: "POST",
                                            data: {
                                                nome: $('#nomeAutore').val(),
                                                descrizione: $('#descrizioneAutore').val()

                                            },
                                            dataType: "json",
                                            success: function (validation)
                                            {
                                                if (validation) //if success close modal and reload ajax table
                                                {
                                                    $('#myModal_autore').modal('hide');
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





                                    $(document).ready(function () {

                                        $(".select2_demo_3").select2({
                                            placeholder: "Seleziona il tipo di presa in carico",
                                            allowClear: true
                                        });


                                        $(".select2_demo_4").select2({
                                            placeholder: "Seleziona la percentuale",
                                            allowClear: true
                                        });

                                        $(".select2_demo_autore").select2({
                                            placeholder: "Seleziona l'autore",
                                            allowClear: true
                                        });

                                        $(".select2_demo_casa_editrice").select2({
                                            placeholder: "Seleziona l'editore",
                                            allowClear: true
                                        });




                                    });





                                    $('.date').datepicker({
                                        language: 'it-IT',
                                        format: 'dd/mm/yyyy'

                                    });

                                    $(".date").datepicker('setDate', new Date());

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





                                    function saveCaricaMagazzino()
                                    {
                                        $('#btnSave').text('saving...'); //change button text
                                        $('#btnSave').attr('disabled', true); //set button disable 

                                        $("#labelQuantitaTotali").css("color", "#676a6c");
                                        $("#labelPercentualeSconto").css("color", "#676a6c");
                                        $("#labelNumeroCopieOmaggio").css("color", "#676a6c");
                                        $("#labelIdTipoPresaInCarico").css("color", "#676a6c");

                                        if ($('#quantitaTotali').val() === '') {
                                            toastr.error('Inserire Quantità totali', 'Attenzione!');
                                            $("#labelQuantitaTotali").css("color", "red");
                                            return;
                                        }

                                        if ($('.select2_demo_4').val() === '') {
                                            toastr.error('Inserire Percentuale di Sconto', 'Attenzione!');
                                            $("#labelPercentualeSconto").css("color", "red");
                                            return;
                                        }

                                        if ($('#numeroCopieOmaggio').val() === '') {
                                            toastr.error('Inserire Numero Copie Omaggio', 'Attenzione!');
                                            $("#labelNumeroCopieOmaggio").css("color", "red");
                                            return;
                                        }

                                        if ($('.select2_demo_3').val() == 0) {
                                            toastr.error('Selezionare Tipo Presa in Carico', 'Attenzione!');
                                            $("#labelIdTipoPresaInCarico").css("color", "red");
                                            return;
                                        }









                                        // ajax adding data to database
                                        $.ajax({
                                            url: "<?php echo site_url('magazzino/inserisciArticolo') ?>",
                                            type: "POST",
                                            data: {
                                                trovato: $('#trovato').val(),
                                                isbn: $('#isbn').val(),
                                                totalePrezzoDocumentoCarico: $('#totalePrezzoDocumentoCarico').val(),
                                                idContenutoTipo: $('#idContenutoTipo').val(),
                                                idDistributore: $('#idDistributore').val(),
                                                idTipoPresaInCarico: $('#idTipoPresaInCarico').val(),
                                                documentoCarico: $('#documentoCarico').val(),
                                                dataCarico: $('#dataCarico').val(),
                                                titolo: $('#titolo').val(),
                                                autore: $('#autore').val(),
                                                editore: $('#editore').val(),
                                                annoPubblicazione: $('#annoPubblicazione').val(),
                                                prezzo: $('#prezzo').val(),
                                                quantitaTotali: $('#quantitaTotali').val(),
                                                percentualeSconto: $('#percentualeSconto').val(),
                                                numeroCopieOmaggio: $('#numeroCopieOmaggio').val(),
                                                idTipoPresaInCarico: $('#idTipoPresaInCarico').val(),
                                                codiceSap: $('#codiceSap').val()
                                            },
                                            dataType: "json",
                                            success: function (validation)
                                            {
                                                if (validation) //if success close modal and reload ajax table
                                                {

                                                    toastr.success('Articolo inserito con successo!');

                        //                                                                    setTimeout(function () {
                        //                                                                        location.reload();
                        //                                                                    }, 500);
                                                    document.modulo.action = "<?php $_SERVER['PHP_SELF']; ?>";
                                                    $('#isbn').val('');
                                                    document.modulo.submit();

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





                                    $(document).ready(function () {

                                        if ($('#trovato').val() === 'NON TROVATO') {
                                            toastr.error('Articolo non trovato in magazzino', 'Attenzione!');
                        //                    $("#labelNumeroCopieOmaggio").css("color", "red");
                                            return;
                                        }

                                        if ($('#trovato').val() === 'TROVATO') {
                                            toastr.success('Articolo trovato in magazzino');
                        //                    $("#labelNumeroCopieOmaggio").css("color", "red");
                                            return;
                                        }

                                        $(".select2_demo_3").select2({
                                            placeholder: "Seleziona il tipo di presa in carico",
                                            allowClear: true
                                        });


                                    });
                                </script>

                                </body>

                                </html>
