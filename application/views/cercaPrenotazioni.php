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



        <link href="<?php echo base_url('assets/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css'); ?>" rel="stylesheet" type="text/css">


        <style>
            
            
            @media print {
    .myDivToPrint {
        background-color: white;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 50px;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
    }
    
    .risultato {
       margin-top: 20px;
    }
    
     .print {
         
         display: none;
         
      
    }
    
}

        </style>



    </head>

    <body>

        <div id="wrapper">

            <?php $this->view('menu'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">

                        <h3 class="page-header" style="margin: 20px 0 10px">Cerca Prenotazioni</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row myDivToPrint">
                    <form role="form" method="post" action="<?php echo site_url('corsi/cercaPrenotazioni/') ?>" name="modulo" >  

                        <div class="form-group col-md-3">
                            <label>Da</label><br>
                            <div class='input-group date' id='datetimepickerDa'>
                                <input type='text' class="form-control" name="da" value="<?php echo $daFiltro; ?>"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label>A</label><br>
                            <div class='input-group date' id='datetimepickerA'>
                                <input type='text' class="form-control" name="a" value="<?php echo $aFiltro; ?>"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Distributore</label><br>
                            <select name="distributore" id="distributore" class="selectpicker" data-live-search-style="startsWith" data-show-subtext="true" data-live-search="true" data-width="400px" >
                                <option value="">--Select distributore--</option>

                                <?php
                                foreach ($distributori as $item):

                                    if ($distributoreFiltro == $item->distributore) {
                                        ?>
                                        <option selected value="<?php echo $item->distributore; ?>"><?php echo$item->distributore; ?></option>

                                    <?php } ?>


                                    ?>
                                    <option value="<?php echo $item->distributore; ?>" data-tokens="<?php echo $item->distributore; ?>"  ><?php echo $item->distributore; ?></option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                            <button type="button" onclick="window.location = '<?php echo site_url('corsi/cercaPrenotazioni') ?>';" class="btn btn-danger" style="float:right;margin-right: 0px;">Reset</button>
                            <button type="button" id="btnSave" onclick="validatorForm()" class="btn btn-primary" style="float:right;margin-right: 5px;">Cerca</button>
                        </div>
                    </form>

                    <?php
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    if (isset($prenotazioni) && $prenotazioni['totaleDistributore']!="0.00") {
                        ?>              
                     
                    <div style="margin-top: 150px;" class="risultato">
                            <button type="button" class="btn btn-default print" onclick="window.print();" style="float:right">
                                                                <span class="fa fa-print" aria-hidden="true"></span>
                                                            </button>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="3">Totale: <?php echo $prenotazioni['totaleDistributore']; ?> </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($prenotazioni['prenotazioni'] as $item):
                                        ?>
                                        <tr>
                                            <td><?php echo $item->posti; ?></td>
                                            <td><?php echo $item->titolo_ITA; ?></td>
                                            <td><?php echo $item->prezzoCorsoTotale; ?></td>
                                        </tr>
                                    <?php endforeach; ?>  
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->

                                    <?php
                                }else {
                                    
                                    if($distributoreFiltro!=""){
                                        echo "<h4 style=\"text-align:center;margin-top:200px;\">Nessuna prenotazione con questo criterio di ricerca</h4>"; 
                                    }
                                    
                                }
                                ?>





















                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->


        <!--         jQuery -->
        <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>


        <script src="<?php echo base_url('assets/vendor/moment/moment.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendor/moment/locale/it.js'); ?>"></script>
        
        
        
        

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>

        <!-- bootstrap-select -->
        <script src="<?php echo base_url('assets/vendor/bootstrap-select/js/bootstrap-select.min.js'); ?>"></script>


        <!-- bootstrap-select -->
        <script src="<?php echo base_url('assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'); ?>"></script>



        <script>



                                function validatorForm()
                                {



                                    if ($("#datetimepickerDa").find("input").val() === '' || $("#datetimepickerDa").find("input").val() === undefined) {
                                        alert("Inserire una data Da");
                                        return false;
                                    }

                                    if ($("#datetimepickerA").find("input").val() === '' || $("#datetimepickerA").find("input").val() === undefined) {
                                        alert("Inserire una data A");
                                        return false;
                                    }

                                    if ($("#distributore").val() === '' || $("#distributore").val() === undefined) {
                                        alert("Selezionare un distributore");
                                        return false;
                                    }

                                    document.modulo.submit();

                                }





                                $(function () {
                                    $('#datetimepickerDa').datetimepicker(
                                            {

                                                format: 'DD/MM/YYYY'
                                            }

                                    );
                                    $('#datetimepickerA').datetimepicker({
                                        useCurrent: false, //Important! See issue #1075
                                        format: 'DD/MM/YYYY'



                                    });
                                    $("#datetimepickerDa").on("dp.change", function (e) {
                                        $('#datetimepickerA').data("DateTimePicker").minDate(e.date);
                                    });
                                    $("#datetimepickerA").on("dp.change", function (e) {
                                        $('#datetimepickerDa').data("DateTimePicker").maxDate(e.date);

                                    });






                                });



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
