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



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- bootstrap select  -->
        <link href="<?php echo base_url('assets/vendor/bootstrap-select/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css">


    </head>

    <body>

        <div id="wrapper">

            <?php $this->view('menu'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">

                        <button type="button" class="btn btn-primary" onclick="prenotazioneAdd();" style="float:right;margin-top: 10px;margin-left: 10px;">Nuova Prenotazione</button>

                        <h3 class="page-header" style="margin: 20px 0 10px">Prenotazioni corso: <?php print($corso[0]->titolo_ITA); ?></h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="panel panel-default">

                            <div class="panel-body">

                                <div class="panel-group" id="accordion">

                                    <?php
                                    foreach ($prenotazioni as $value) {
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">

                                                <div style="float:left;">
                                                    <h4 class="panel-title" >
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $value->gruppo; ?>" class="collapsed" aria-expanded="false"><?php echo str_replace(",", ", ", $value->saveTheDate); ?></a>
                                                    </h4>
                                                </div>
                                                <div style="float:right; width: 70%;">

                                                    <div class="alert alert-danger" style="padding: 3px; margin-bottom: 0px;  margin-left: 10px; float: right;">Rifiutati: <span ><?php echo $value->numeroPostiRifiutati; ?></span></div>
                                                    <div class="alert alert-warning" style="padding: 3px; margin-bottom: 0px; margin-left: 10px; float: right;">In Attesa: <span ><?php echo $value->numeroPostiInAttesa; ?></span></div>
                                                    <div class="alert alert-success" style="padding: 3px; margin-bottom: 0px; margin-left: 10px;  float: right;">Confermati: <span ><?php echo $value->numeroPostiConfermati; ?></span></div>

                                                    <?php
                                                    $numMax = $corso[0]->numeroPartecipantiMax +$corso[0]->numeroPartecipantiOverbooking;
                                                    $percentuale = ($value->numeroPostiConfermati / $corso[0]->numeroPartecipantiMax) * 100;
                                                    $numLiberi = $numMax - $value->numeroPostiConfermati;
                                                    ?>

                                                    <div style="margin-bottom: 0px; margin-left: 10px;float: right;width: 20%;">   
                                                        <div class="progress" style="background-color: #f2dede;margin-bottom: 5px; height: 23px;">
                                                                                                                   
                                                                 <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="8" style="width:<?php echo $percentuale; ?>%;"   >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div  style="padding: 3px; margin-bottom: 0px; margin-left: 10px; float: right;;">
                                                            Ancora <?php echo $numLiberi; ?> posti liberi
                                                        </div>

                                                        <div style="clear: both;"></div>
                                                    </div>
                                                    <div style="clear: both;"></div>

                                                </div>

                                                <div id="collapse<?php echo $value->gruppo; ?>" class="panel-collapse collapse in" aria-expanded="false">
                                                    <div class="panel-body">

                                                        <?php
                                                        
                                                        if (count($value->elenco) > 0) {
                                                            ?>
                                                            <div class="table-responsive">
                                                                <table class="table table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Posti</th>
                                                                            <th>Agente</th>
                                                                            <th>Distributore</th>
                                                                            <th style="text-align:center">Stato</th>
                                                                            <th style="width:3%"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php
                                                                        foreach ($value->elenco as $item):
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $item->numeroPosti; ?></td>
                                                                                <td><?php echo $item->agente; ?></td>
                                                                                <td><?php echo $item->distributore; ?></td>
                                                                                <?php
                                                                                if ($item->statoId == 1) {
                                                                                    $stato = '<div class="alert alert-warning" style="padding: 3px; margin-bottom: 0px;">' . $item->stato . '</div>';
                                                                                } else if ($item->statoId == 2) {
                                                                                    $stato = '<div class="alert alert-success" style="padding: 3px; margin-bottom: 0px;">' . $item->stato . '</div>';
                                                                                } else if ($item->statoId == 3) {
                                                                                    $stato = '<div class="alert alert-danger" style="padding: 3px; margin-bottom: 0px;">' . $item->stato . '</div>';
                                                                                }
                                                                                ?>
                                                                                <td style="text-align:center"><?php echo $stato; ?></td>
                                                                                <td>  
                                                                                    <button type="button" class="btn btn-default btn-sm" onclick="dettaglioPrenotazione(<?php echo $item->id; ?>)">
                                                                                        <span class="glyphicon glyphicon-pencil " aria-hidden="true"></span>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; ?>   
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <?php
                                                        } else {

                                                            echo "<h4 style=\"text-align:center\">Nessuna prenotazione</h4>";
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                        }
                                        ?>
                                    </div>

                                </div>
                                <!-- /.panel-body -->
                            </div>

                        </div>

                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /#page-wrapper -->

            </div>
            <!-- /#wrapper -->



            <!-- Bootstrap modal -->
            <div class="modal fade" id="modal_form_add" role="dialog">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Dettaglio Prenotazione Corso</h3>
                        </div>
                        <div class="modal-body form">
                            <form action="#" id="form" class="form-horizontal">

                                <input type="hidden" value="<?php print($corso[0]->id); ?>" id="idCorso" name="idCorso"/> 

                                <div class="form-body">
                                    
                                    
                                       <div class="form-group">
                                        <label class="control-label col-md-3">Save The Date</label>
                                        <div class="col-md-9" style="padding-left: 0px;">

                                            <div style="float: left; margin-right: 10px;">
                                                <select name="gruppo" id="gruppo" class="selectpicker" data-live-search-style="startsWith" data-show-subtext="true" data-live-search="true" data-width="420px" >
                                                    <option value="">--Select Save The Date--</option>

                                                    <?php
                                                    foreach ($saveTheDate as $item):
                                                        ?>
                                                    <option value="<?php echo $item->gruppo; ?>" ><?php echo str_replace(",",", ", $item->saveTheDate); ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?>

                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Agente</label>
                                        <div class="col-md-9" style="padding-left: 0px;">

                                            <div style="float: left; margin-right: 10px;">
                                                <select name="venditore_id" id="venditore_id" class="selectpicker" data-live-search-style="startsWith" data-show-subtext="true" data-live-search="true" data-width="420px" onchange="select(this)" >
                                                    <option value="">--Select agente--</option>

                                                    <?php
                                                    foreach ($venditori as $item):
                                                        ?>
                                                        <option value="<?php echo $item->id; ?>" data-tokens="<?php echo $item->agente; ?>"  ><?php echo $item->agente; ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?>

                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Distributore</label>
                                        <div class="col-md-9" style="padding-left: 0px;">
                                            <input name="distributore" id="distributore" disabled="disabled" class="form-control" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Salone</label>
                                        <div class="col-md-9" style="padding-left: 0px;">
                                            <input name="salone" id="salone"  class="form-control" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">N° Posti Prenotati</label>
                                        <div class="col-md-9" style="padding-left: 0px;">
                                            <input name="numeroPosti" id="numeroPosti" class="form-control" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Prezzo Singolo €</label>
                                        <div class="col-md-9" style="padding-left: 0px;">
                                            <input name="prezzo" id="prezzo"  disabled="disabled" class="form-control" type="text" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Prezzo Totale €</label>
                                        <div class="col-md-9" style="padding-left: 0px;">
                                            <input name="prezzoTotale" id="prezzoTotale" readonly="readonly" class="form-control" type="text" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Stato</label>
                                        <div class="col-md-9" style="padding-left: 0px;" id="selectStato">
                                            <div style="float: left; margin-right: 10px;">
                                                <select name="statoSelect" id="statoSelect" class="selectpicker" data-width="420px" >
                                                    <option value="0">--Select stato--</option>
                                                    <option value="1">In attesa</option>
                                                    <option value="2">Confermato</option>
                                                </select>
                                            </div>



                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSave" onclick="salvaPrenotazione()" class="btn btn-primary" style="float:right">Salva</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->





            <!-- Bootstrap modal -->
            <div class="modal fade" id="modal_form" role="dialog">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Dettaglio Prenotazione Corso</h3>
                        </div>
                        <div class="modal-body form">
                            <form action="#" id="form" class="form-horizontal">

                                <input type="hidden" value="<?php print($corso[0]->id); ?>" id="idCorso" name="idCorso"/> 

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Agente</label>
                                        <div class="col-md-9" style="padding-left: 0px;">
                                            <input name="agente" id="agente" disabled="disabled" class="form-control" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Distributore</label>
                                        <div class="col-md-9" style="padding-left: 0px;">
                                            <input name="distributore" id="distributore" disabled="disabled" class="form-control" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Salone</label>
                                        <div class="col-md-9" style="padding-left: 0px;">
                                            <input name="salone" id="salone" disabled="disabled" class="form-control" type="text" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3">N° Posti Prenotati</label>
                                        <div class="col-md-9" style="padding-left: 0px;">
                                            <input name="numeroPosti" id="numeroPosti"  disabled="disabled" class="form-control" type="text" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Prezzo Singolo €</label>
                                        <div class="col-md-9" style="padding-left: 0px;">
                                            <input name="prezzo" id="prezzo" disabled="disabled" value="" class="form-control" type="text" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Prezzo Totale €</label>
                                        <div class="col-md-9" style="padding-left: 0px;">
                                            <input name="prezzoTotale" id="prezzoTotale" disabled="disabled"  class="form-control" type="text" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Stato</label>
                                        <div class="col-md-9" style="padding-left: 0px;" id="labelStato">

                                        </div>
                                    </div>

                                    <input name="idPrenotazione" id="idPrenotazione" class="form-control" type="hidden" >

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSave" onclick="cambiaStato(2)" class="btn btn-success" style="float:right">Conferma</button>
                            <button type="button" class="btn btn-danger" onclick="cambiaStato(3)" style="float:left">Rifiuta</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- End Bootstrap modal -->


            <!-- jQuery -->
            <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>

            <!-- Custom Theme JavaScript -->
            <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>


            <!-- bootstrap-select -->
            <script src="<?php echo base_url('assets/vendor/bootstrap-select/js/bootstrap-select.min.js'); ?>"></script>


            <script>


                                $(document).ready(function ()
                                {
                                    function updatePrice()
                                    {
                                        var price = parseFloat($("#prezzo").val());
                                        var total = (price * $("#numeroPosti").val());
                                        var total = total.toFixed(2);
                                        $("#prezzoTotale").val(total);
                                    }
                                    $(document).on("change, keyup", "#numeroPosti", updatePrice);
                                });


                                function select()
                                {

                                    idVenditore = $("#venditore_id").val();

                                    $.ajax({
                                        url: "<?php echo site_url('corsi/getDistributoreByIdVenditore/') ?>" + idVenditore,
                                        type: "GET",
                                        dataType: "JSON",
                                        success: function (data)
                                        {

                                            $('[name="distributore"]').val(data[0].distributore);

                                        },
                                        error: function (jqXHR, textStatus, errorThrown)
                                        {
                                            alert('Error get data from ajax');
                                        }
                                    });
                                }




                                function cambiaStato(tipoAzione)
                                {

                                    $('#btnSave').text('saving...'); //change button text
                                    $('#btnSave').attr('disabled', true); //set button disable 

                                    $.ajax({
                                        url: "<?php echo site_url('corsi/statoPrenotazioneUpdate') ?>",
                                        type: "POST",
                                        data: {
                                            idPrenotazione: $("#idPrenotazione").val(),
                                            venditore: $("#venditore_id").val(),
                                            numeroPosti: $("#numeroPosti").val(),
//                                           venditore: $("#venditore_id").val(),
                                             stato: tipoAzione
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



                                function salvaPrenotazione()
                                {

                                    $('#btnSave').text('saving...'); //change button text
                                    $('#btnSave').attr('disabled', true); //set button disable 

                                    $.ajax({
                                        url: "<?php echo site_url('corsi/addPrenotazione') ?>",
                                        type: "POST",
                                        data: {
                                            idCorso: $('#idCorso').val(),
                                            gruppo: $('#gruppo').val(),
                                            salone: $('#salone').val(),
                                            venditore_id: $('#venditore_id').val(),
                                            numeroPosti: $('#numeroPosti').val(),
                                            stato: $('#statoSelect').val()
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


                                function prenotazioneAdd()
                                {
                                    $('#form')[0].reset(); // reset form on modals
                                    $('.form-group').removeClass('has-error'); // clear error class
                                    $('.help-block').empty(); // clear error string
                                    var prezzoSingolo = (<?php echo $corso[0]->prezzo; ?>);
                                    $('[name="prezzo"]').val(prezzoSingolo.toFixed(2));


                                    $('#modal_form_add').modal('show'); // show bootstrap modal
                                    $('.modal-title').text('Nuova Prenotazione'); // Set Title to Bootstrap modal title
                                }

                                function dettaglioPrenotazione(id)
                                {

                                    $("#labelStato").empty();
                                    save_method = 'update';
                                    $('#form')[0].reset(); // reset form on modals
                                    $('.form-group').removeClass('has-error'); // clear error class
                                    $('.help-block').empty(); // clear error string

                                    //Ajax Load data from ajax
                                    $.ajax({
                                        url: "<?php echo site_url('corsi/getPrenotazioneById/') ?>/" + id,
                                        type: "GET",
                                        dataType: "JSON",
                                        success: function (data)
                                        {

                                            $('[name="idPrenotazione"]').val(data[0].id);
                                            $('[name="agente"]').val(data[0].agente);
                                            $('[name="distributore"]').val(data[0].distributore);
                                            $('[name="salone"]').val(data[0].salone);
                                            $('[name="numeroPosti"]').val(data[0].numeroPosti);

                                            var prezzoSingolo = (<?php echo $corso[0]->prezzo; ?>);
                                            $('[name="prezzo"]').val(prezzoSingolo.toFixed(2));
                                            var prezzoTotale = (<?php echo $corso[0]->prezzo; ?> * data[0].numeroPosti);

                                            $('[name="prezzoTotale"]').val(prezzoTotale.toFixed(2));

                                            $('[name="stato"]').val(data[0].statoId);
                                            var labelStato;
                                            if (data[0].statoId == 1) {
                                                labelStato = '<div class="alert alert-warning" style="padding: 3px; margin-bottom: 0px;">' + data[0].stato + '</div>';
                                            } else if (data[0].statoId == 2) {
                                                labelStato = '<div class="alert alert-success" style="padding: 3px; margin-bottom: 0px;">' + data[0].stato + '</div>';
                                            } else if (data[0].statoId == 3) {
                                                labelStato = '<div class="alert alert-danger" style="padding: 3px; margin-bottom: 0px;">' + data[0].stato + '</div>';
                                            }

                                            $("#labelStato").append(labelStato);
                                            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded

                                        },
                                        error: function (jqXHR, textStatus, errorThrown)
                                        {
                                            alert('Error get data from ajax');
                                        }
                                    });
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









            </script>





    </body>

</html>
