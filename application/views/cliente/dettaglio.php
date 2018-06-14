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


        <style>

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

            <?php $this->view('menu_sx'); ?>
            <div id="page-wrapper" class="gray-bg">

                <?php $this->view('menu_top'); ?>

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Dettaglio Cliente: <b><?php echo $data->nome; ?> </b></h2>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
                <!--                <div class="wrapper wrapper-content animated fadeInRight">-->
                <div class="wrapper wrapper-content">
                    <input type="text" class="form-control input-sm" id="idCliente" value="<?php echo $data->id; ?>" >
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
                                                      <button type="button" class="btn btn-primary btn-sm">Small button</button>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                       <button type="button" class="btn btn-primary btn-sm">Small button</button>
                                                    </div>


                                                    <div class="form-group col-md-2">   
                                                       <button type="button" class="btn btn-primary btn-sm">Small button</button>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                       <button type="button" class="btn btn-primary btn-sm">Small button</button>
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="titolo">Nome o Soc</label>
                                                        <input type="text" class="form-control input-sm" id="nome" value="<?php echo $data->nome; ?>" >
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="quantitaTotali" id="labelQuantitaTotali">Cognome</label>
                                                        <input type="text" class="form-control input-sm" id="cognome" value="<?php echo $data->cognome; ?>"  placeholder="Cognome">
                                                    </div>


                                                    <div class="form-group col-md-2">   
                                                        <label for="titolo">Codice Fiscale</label>
                                                        <input type="text" class="form-control input-sm" id="codice_fiscale" value="<?php echo $data->codice_fiscale; ?>" >
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="quantitaTotali" id="labelQuantitaTotali">P. Iva</label>
                                                        <input type="text" class="form-control input-sm" id="p_iva" value="<?php echo $data->p_iva; ?>"  placeholder="P. Iva">
                                                    </div>

                                                </div>

                                                <div class="form-row">

                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Indirizzo Fatturazione</label>
                                                        <input type="text" class="form-control input-sm" id="indirizzo" value="<?php echo $data->indirizzo; ?>"  placeholder="Indirizzo Fatturazione">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Cap Fatturazione</label>
                                                        <input type="text" class="form-control input-sm" id="cap" value="<?php echo $data->cap; ?>" placeholder="Cap">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Città Fatturazione</label>
                                                        <input type="text" class="form-control input-sm" id="citta" value="<?php echo $data->citta; ?>" placeholder="Città">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Indirizzo Spedizione</label>
                                                        <input type="text" class="form-control input-sm" id="indirizzo_spedizione" value="<?php echo $data->indirizzo_spedizione; ?>" placeholder="Indirizzo Spedizione">
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Cap Spedizione</label>
                                                        <input type="text" class="form-control input-sm" id="cap_spedizione" value="<?php echo $data->cap_spedizione; ?>" placeholder="Indirizzo Spedizione">
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Città Spedizione</label>
                                                        <input type="text" class="form-control input-sm" id="citta_spedizione" value="<?php echo $data->citta_spedizione; ?>" placeholder="Città">
                                                    </div>
                                                </div>
                                                <div class="form-row">

                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Telefono Fisso</label>
                                                        <input type="text" class="form-control input-sm" id="fisso" value="<?php echo $data->fisso; ?>"  placeholder="Telefono Fisso">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Cellulare</label>
                                                        <input type="text" class="form-control input-sm" id="cap" value="<?php echo $data->cellulare; ?>" placeholder="Cellulare">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Studio di Appartenenza</label>
                                                        <input type="text" class="form-control input-sm" id="ragione_sociale" value="<?php echo $data->ragione_sociale; ?>" placeholder="Studio di Appartenenza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Percentuale di Sconto</label>

                                                        <select class="select2_demo_4 form-control"  name="percentuale_sconto" id="percentuale_sconto" style="width:100%">
                                                            <option></option>
                                                            <?php
                                                            foreach ($percentuale as $item):

                                                                if ($data->percentuale_sconto == $item->name) {
                                                                    $selected = "selected";
                                                                } else {
                                                                    $selected = "";
                                                                }
                                                                ?>
                                                                <option value="<?php echo $item->name; ?>"   <?php echo $selected; ?>     data-tokens="<?php echo $item->name; ?>%"  ><?php echo $item->name; ?>%</option>
                                                                <?php
                                                            endforeach;
                                                            ?>
                                                        </select>




                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Codice SAP</label>
                                                        <input type="text" class="form-control input-sm" id="codice_sap" value="<?php echo $data->codice_sap; ?>" placeholder="Codice SAP">
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Rappresentante</label>

                                                        <select class="select2_demo_3 form-control" name="rappresentante" id="rappresentante" style="width:100%">
                                                            <option></option>
                                                            <?php
                                                            foreach ($rapprensentati as $item):
                                                                ?>
                                                                <option <?php echo ($item->id == $data->id_rappresentante) ? 'selected' : ''; ?> value="<?php echo $item->id; ?>" data-tokens="<?php echo $item->nome; ?>"  ><?php echo $item->nome; ?></option>
                                                                <?php
                                                            endforeach;
                                                            ?>
                                                        </select>

                                                    </div>

                                                    <div style="clear:both"></div>
                                                </div>




                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Importo Rata da Ritirare</label>
                                                        <input type="text" class="form-control input-sm" id="rata_da_ritirare" value="<?php echo $data->rata_da_ritirare; ?>"  placeholder="Importo Rata da Ritirare">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Codice IPA</label>
                                                        <input type="text" class="form-control input-sm" id="codice_ipa" value="<?php echo $data->codice_ipa; ?>" placeholder="Codice IPA">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Attiva blocco morosi</label><br>

                                                        <input type ="checkbox"id="is_blocked">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="panel-body">

                                                <h3>Dati Banca</h3>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Iban</label>
                                                        <input type="text" class="form-control input-sm" id="iban" value="<?php echo $data->iban; ?>"  placeholder="Iban">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="titolo" id="labelNumeroCopieOmaggio">Banca</label>
                                                        <input type="text" class="form-control input-sm" id="banca" value="<?php echo $data->banca; ?>" placeholder="Banca">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel-body">

                                                <h3>Referenti</h3> 

                                                <button type="button" style="margin-left: 5px;min-width:30px" class="btn btn-w-m btn-default btn-sm" onclick="addMoreRows();">+</button>
                                                <ul id="sortable-row" style="padding-top:15px;margin-left: 18px;">


                                                </ul>
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

            function creaReferenti() {
<?php
foreach ($data->referenti as $item):
    ?>
                    var addLi = '<li id="<?php echo $item->id; ?>" >' +
                            '<div id="div2" style="margin: 0px; display: inline-block;width:86.99%;">' +
                            '<div style="float:left;width:20%">' +
                            '<input type="text" class="form-control input-sm" id="referente_nome" value="<?php echo $item->nome; ?>"  placeholder="Nome">' +
                            '</div>' +
                            '<div style="float:left;margin-left: 0px;width:15%%;vertical-align: top; margin-left:10px">' +
                            '<input type="text" class="form-control input-sm" id="referente_telefono" value="<?php echo $item->telefono; ?>" placeholder="Telefono">' +
                            '</div>' +
                            '<div style="float:left;margin-left: 0px;width:20%;vertical-align: top;margin-left:10px">' +
                            '<input type="text" class="form-control input-sm" id="email" value="<?php echo $item->email; ?>"  placeholder="E-mail">' +
                            '</div>' +
                            '<div style="float:left;margin-left: 0px;width:15%;vertical-align: top; margin-left:10px;">' +
                            '<select class="select2_demo_5 form-control">' +
    <?php
    foreach ($referrer_type as $itemReferr):
        ?>

                        '<option <?php echo ($item->referr_type == $itemReferr->name) ? 'selected' : ''; ?> value="<?php echo $itemReferr->name; ?>" data-tokens="<?php echo $itemReferr->name; ?>"  ><?php echo $itemReferr->name; ?></option>' +
        <?php
    endforeach;
    ?>
                    '</select>' +
                            '<div style="clear:both"></div>' +
                            '</div>' +
                            '<div id="div3" style="float:left; width:2%;border: 0px solid blue;vertical-align: top;margin-left:20px ">' +
                            '<a href="#" class="itemDelete"><i class="fa fa-trash fa-2x" style ="cursor: pointer;"  aria-hidden="true" onclick="removeRowDb(<?php echo $item->id; ?>);"></i></a>' +
                            '</div>' +
                            '</div>' +
                            '</li>';

                    jQuery("#sortable-row").append(addLi);

    <?php
endforeach;
?>

            }
            var rowCount = 0;


            function addMoreRows() {

                rowCount++;

                var greatId = Math.max.apply(null, $('#sortable-row li').map(function () {
                    return $(this).attr('id');
                }));

                if (isFinite(greatId) == false) {
                    greatId = 0;
                 }

                var newId = parseInt(greatId) + 1;

                var addLi = '<li id="'+newId+'">' +
                        '<div id="div2" style="margin: 0px; display: inline-block;width:86.99%;">' +
                        '<div style="float:left;width:20%">' +
                        '<input type="text" class="form-control input-sm" id="referente_nome" value=""  placeholder="Nome">' +
                        '</div>' +
                        '<div style="float:left;margin-left: 0px;width:15%%;vertical-align: top; margin-left:10px">' +
                        '<input type="text" class="form-control input-sm" id="referente_telefono" value="" placeholder="Telefono">' +
                        '</div>' +
                        '<div style="float:left;margin-left: 0px;width:20%;vertical-align: top;margin-left:10px">' +
                        '<input type="text" class="form-control input-sm" id="email" value=""  placeholder="E-mail">' +
                        '</div>' +
                        '<div style="float:left;margin-left: 0px;width:15%;vertical-align: top; margin-left:10px;">' +
                        '<select class="select2_demo_5 form-control">' +
                    <?php
                    foreach ($referrer_type as $itemReferr): ?>
                    '<option value="<?php echo $itemReferr->name; ?>" data-tokens="<?php echo $itemReferr->name; ?>"  ><?php echo $itemReferr->name; ?></option>' +
                        <?php endforeach; ?>
                        '</select>' +
                        '<div style="clear:both"></div>' +
                        '</div>' +
                        '<div id="div3" style="float:left; width:2%;border: 0px solid blue;vertical-align: top;margin-left:20px ">' +
                        '<a href="#" class="itemDelete"><i class="fa fa-trash fa-2x" style ="cursor: pointer;"  aria-hidden="true" ></i></a>' +
                        '</div>' +
                        '</div>' +
                        '</li>';


                jQuery('#sortable-row').append(addLi);
            }


                         $('#sortable-row').on('click', '.itemDelete', function () {
                                        $(this).closest('li').remove();
                                    });



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




            $(document).ready(function () {

                creaReferenti();

                $(".select2_demo_3").select2({
                    placeholder: "Seleziona reappresentante",
                    allowClear: true
                });


                $(".select2_demo_4").select2({
                    placeholder: "Seleziona la percentuale",
                    allowClear: true
                });

                $(".select2_demo_5").select2({
                    placeholder: "Seleziona tipo di contatto",
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
