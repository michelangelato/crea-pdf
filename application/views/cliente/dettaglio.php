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

    </head>

    <body>

        <div id="wrapper">

            <?php $this->view('menu_sx'); ?>
            <div id="page-wrapper" class="gray-bg">

                <?php $this->view('menu_top'); ?>

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Dettaglio Cliente</h2>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
                <!--                <div class="wrapper wrapper-content animated fadeInRight">-->
                <div class="wrapper wrapper-content">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Anagrafica</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Articoli in Visione</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Vendite</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Resi Post Vendita</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Dovuti</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="panel-body">

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="titolo">Nome o Soc</label>
                                                        <input type="text" class="form-control input-sm" id="nome" value="<?php echo $data[0]->nome; ?>" >
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="quantitaTotali" id="labelQuantitaTotali">Cognome</label>
                                                        <input type="text" class="form-control input-sm" id="cognome" value="<?php echo $data[0]->cognome; ?>"  placeholder="Cognome">
                                                    </div>


                                                    <div class="form-group col-md-2">   
                                                        <label for="titolo">Codice Fiscale</label>
                                                        <input type="text" class="form-control input-sm" id="codice_fiscale" value="<?php echo $data[0]->codice_fiscale; ?>" >
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="quantitaTotali" id="labelQuantitaTotali">P. Iva</label>
                                                        <input type="text" class="form-control input-sm" id="p_iva" value="<?php echo $data[0]->p_iva; ?>"  placeholder="P. Iva">
                                                    </div>

                                                </div>

                                                <div class="form-row">

                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Indirizzo Fatturazione</label>
                                                        <input type="text" class="form-control input-sm" id="indirizzo" value="<?php echo $data[0]->indirizzo; ?>"  placeholder="Indirizzo Fatturazione">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Cap Fatturazione</label>
                                                        <input type="text" class="form-control input-sm" id="cap" value="<?php echo $data[0]->cap; ?>" placeholder="Cap">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Città Fatturazione</label>
                                                        <input type="text" class="form-control input-sm" id="citta" value="<?php echo $data[0]->citta; ?>" placeholder="Città">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Indirizzo Spedizione</label>
                                                        <input type="text" class="form-control input-sm" id="indirizzo_spedizione" value="<?php echo $data[0]->indirizzo_spedizione; ?>" placeholder="Indirizzo Spedizione">
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Cap Spedizione</label>
                                                        <input type="text" class="form-control input-sm" id="cap_spedizione" value="<?php echo $data[0]->cap_spedizione; ?>" placeholder="Indirizzo Spedizione">
                                                    </div>
                                                    
                                                     <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Città Spedizione</label>
                                                        <input type="text" class="form-control input-sm" id="citta_spedizione" value="<?php echo $data[0]->citta_spedizione; ?>" placeholder="Città">
                                                    </div>
                                                </div>
<div class="form-row">

                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Telefono Fisso</label>
                                                        <input type="text" class="form-control input-sm" id="fisso" value="<?php echo $data[0]->fisso; ?>"  placeholder="Telefono Fisso">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Cellulare</label>
                                                        <input type="text" class="form-control input-sm" id="cap" value="<?php echo $data[0]->cellulare; ?>" placeholder="Cellulare">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Studio di Appartenenza</label>
                                                        <input type="text" class="form-control input-sm" id="ragione_sociale" value="<?php echo $data[0]->ragione_sociale; ?>" placeholder="Studio di Appartenenza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Percentuale di Sconto</label>
                                                        <input type="text" class="form-control input-sm" id="percentuale_sconto" value="<?php echo $data[0]->percentuale_sconto; ?>" placeholder="Percentuale di Sconto">
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Codice SAP</label>
                                                        <input type="text" class="form-control input-sm" id="codice_sap" value="<?php echo $data[0]->codice_sap; ?>" placeholder="Codice SAP">
                                                    </div>
                                                    
                                                     <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Rappresentante</label>
                                                        <input type="text" class="form-control input-sm" id="id_rappresentante" value="<?php echo $data[0]->citta_spedizione; ?>" placeholder="Rappresentante">
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="panel-body">
                                                <strong>Donec quam felis</strong>

                                                <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                                    and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                                <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                                    sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
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

        <!-- Select2 -->
        <script src="<?php echo base_url('assets/js/plugins/select2/select2.full.min.js'); ?>"></script>

        <!-- Data picker -->
        <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.it.min.js'); ?>"></script>

        <!-- Toastr script -->
        <script src="<?php echo base_url('assets/js/plugins/toastr/toastr.min.js'); ?>"></script>



        <script>

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



            function goStep2()
            {

                $("#labelTipoContenuto").css("color", "#676a6c");


                if ($('.select2_demo_3').val() === '') {
                    toastr.error('Selezionare la tipologia di documento', 'Attenzione!');
                    $("#labelTipoContenuto").css("color", "red");
                    return;
                }




                var idContenutoTipo = $('#idContenutoTipo').val();

                window.location = "<?php echo base_url("magazzino/inserisciNuovoStep2"); ?>?idContenutoTipo=" + idContenutoTipo;

            }


//                                                        function goStep2()
//                                                        {
//                                                            $('#btnGoStep2').text('avanti...'); //change button text
//                                                            $('#btnGoStep2').attr('disabled', true); //set button disable 
//
//                                                            // ajax adding data to database
//                                                            $.ajax({
//                                                                url: "<?php echo site_url('magazzino/inserisciNuovoStep2') ?>",
//                                                                type: "POST",
//                                                                data: {
//                                                                    idContenutoTipo: $('#nome').val(),
//                                                                    indirizzo: $('#indirizzo').val(),
//                                                                    citta: $('#citta').val(),
//                                                                    cap: $('#cap').val(),
//                                                                    telefono: $('#telefono').val(),
//                                                                    email: $('#email').val(),
//                                                                    piva: $('#p_iva').val(),
//                                                                    percentuale: $('#percentuale_sconto').val(),
//                                                                    referente: $('#referente').val(),
//                                                                    emailReferente: $('#emailReferente').val(),
//                                                                    telefonoReferente: $('#telefonoReferente').val()
//                                                                },
//                                                                dataType: "json",
//                                                                success: function (validation)
//                                                                {
//                                                                    if (validation) //if success close modal and reload ajax table
//                                                                    {
//                                                                        $('#myModal_distributore').modal('hide');
//                                                                        setTimeout(function () {
//                                                                            location.reload();
//                                                                        }, 500);
//                                                                    }
//                                                                    $('#btnGoStep2').text('avanti'); //change button text
//                                                                    $('#btnGoStep2').attr('disabled', false); //set button enable 
//                                                                },
//                                                                error: function (jqXHR, textStatus, errorThrown)
//                                                                {
//                                                                    alert('Error adding / update data');
//                                                                    $('#btnSave').text('save'); //change button text
//                                                                    $('#btnSave').attr('disabled', false); //set button enable 
//
//                                                                }
//                                                            });
//                                                        }

            $(document).ready(function () {

                $(".select2_demo_3").select2({
                    placeholder: "Seleziona la tipologia di contenuto",
                    allowClear: true
                });


            });
        </script>


        <!--        <div class="modal inmodal fade" id="myModal_distributore" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h2 class="modal-title">Nuovo Distributore</h2>
                            </div>
                            <div class="modal-body" style="height:380px">
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputEmail4">Nominativo</label>
                                        <input type="text" class="form-control" id="nome" placeholder="Nominativo">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Indirizzo</label>
                                        <input type="text" class="form-control" id="indirizzo" placeholder="Indirizzo">
                                    </div>
                                </div>
        
        
        
        
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Città</label>
                                        <input type="text" class="form-control" id="citta" placeholder="Città">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Cap</label>
                                        <input type="text" class="form-control" id="cap" placeholder="Cap">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Telefono</label>
                                        <input type="text" class="form-control" id="telefono" placeholder="Telefono">
                                    </div>
                                </div>                                             
        
        
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">P.Iva</label>
                                        <input type="text" class="form-control" id="p_iva" placeholder="P.Iva">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Percentuale di sconto</label>
                                        <input type="text" class="form-control" id="percentuale_sconto" placeholder="Percentuale di sconto">
                                    </div>
                                </div>    
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="hr-line-dashed"></div>
                                    </div>
        
        
                                </div>
        
                                <div class="form-row">
        
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Referente</label>
                                        <input type="text" class="form-control" id="referente" placeholder="Referente">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Email Referente</label>
                                        <input type="text" class="form-control" id="emailReferente" placeholder="Email Referente">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Telefono Referente</label>
                                        <input type="text" class="form-control" id="telefonoReferente" placeholder="Telefono Referente">
                                    </div>
                                </div>  
                            </div>
        
        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Save changes</button>
                            </div>
        
        
        
        
                        </div>
                    </div>
                </div>-->




    </body>

</html>
