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
                        <h2>Inserisci Nuovo Articolo - Step 2</h2>
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
                                    <h5>Seleziona distributore e inserisci documento di carico</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#">Config option 1</a>
                                            </li>
                                            <li><a href="#">Config option 2</a>
                                            </li>
                                        </ul>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <form class="form-horizontal" method="post" name="modulo" action="<?php echo site_url('magazzino/inserisciNuovoStep3') ?>">

                                        <div class="form-group"><label class="col-sm-2 control-label">Tipologia Articolo</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" id="contenutoTipo" value="<?php echo $contenutoTipo[0]->tipo; ?>">
                                                <input type="hidden"  class="form-control" name="idContenutoTipo" value="<?php echo $contenutoTipo[0]->id; ?>">
                                            </div>
                                        </div>


                                        <div class="form-group"><label class="col-sm-2 control-label" id="labelFornitore">Fornitore</label>
                                            <div class="col-sm-10">
                                                <select class="select2_demo_3 form-control"  name="idDistributore" style="width:100%">
                                                    <option></option>
                                                    <?php
                                                    foreach ($distributori as $item):
                                                        ?>
                                                        <option value="<?php echo $item->id; ?>" data-tokens="<?php echo $item->nome; ?>"  ><?php echo $item->nome; ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?>
                                                </select>
                                                <div style="float:right">
                                                    <!--<button type="button" class="btn btn-default btn-xs" style="margin-top: 5px;">Nuovo Distributore</button>-->

                                                    <button type="button"  style="margin-top: 5px;" class="btn btn-primary btn-xs" onclick="distributoreAdd()">
                                                        Nuovo Distributore
                                                    </button>

                                                </div>
                                            </div>


                                        </div>
                                        <div class="hr-line-dashed"></div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" id ="labelDocumentoCarico">Documento di Carico</label>
                                            <div class="col-sm-4"><input type="text" class="form-control" name="documentoCarico" id="documentoCarico"  ></div>
                                            <label class="col-sm-2 control-label" id ="labelDataCarico">Data di Carico</label>

                                            <div class="col-sm-4 input-group date">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i></span>
                                                <input type="text" class="form-control" name="dataCarico" id="dataCarico"> 
                                            </div>
                                        </div>
<!--                                <div class="hr-line-dashed"></div>-->

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" id ="labelDocumentoCarico">Totale €</label>
                                            <div class="col-sm-2"><input type="text" class="form-control" name="totalePrezzoDocumentoCarico" id="totalePrezzoDocumentoCarico" ></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-2">
                                                <button class="btn btn-white" type="submit">Cancel</button>
                                                <button class="btn btn-primary" type="button" onclick="goStep3();">Avanti</button>
                                            </div>
                                        </div>
                                    </form>
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


        <!-- Data picker -->
        <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.it.min.js'); ?>"></script>

        <!-- Select2 -->
        <script src="<?php echo base_url('assets/js/plugins/select2/select2.full.min.js'); ?>"></script>

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



                                                    function goStep3()
                                                    {


                                                        //alert($('.select2_demo_3').val());

                                                        $("#labelFornitore").css("color", "#676a6c");
                                                        $("#labelDocumentoCarico").css("color", "#676a6c");
                                                        $("#labelDataCarico").css("color", "#676a6c");

                                                        if ($('.select2_demo_3').val() === '') {
                                                            toastr.error('Selezionare Il Fornitore', 'Attenzione!');
                                                            $("#labelFornitore").css("color", "red");
                                                            return;
                                                        }



                                                        if ($('#documentoCarico').val() === '') {
                                                            toastr.error('Inserire documento di carico', 'Attenzione!');
                                                            $("#labelDocumentoCarico").css("color", "red");
                                                            return;
                                                        }

                                                        if ($('#dataCarico').val() === '') {
                                                            toastr.error('Inserire la data di carico', 'Attenzione!');
                                                            $("#labelDataCarico").css("color", "red");
                                                            return;
                                                        }



                                                        //window.location = "<?php echo base_url("magazzino/inserisciNuovoStep2"); ?>?idContenutoTipo=" + idContenutoTipo;
                                                         document.modulo.submit();
                                                    }























                                                    $('.date').datepicker({
                                                        language: 'it-IT',
                                                        format: 'dd/mm/yyyy'

                                                    });

                                                    $(".date").datepicker('setDate', new Date());


                                                    function distributoreAdd()
                                                    {
                                                        $('#myModal_distributore').modal('show'); // show bootstrap modal
                                                    }

                                                    function save()
                                                    {
                                                        $('#btnSave').text('saving...'); //change button text
                                                        $('#btnSave').attr('disabled', true); //set button disable 

                                                        // ajax adding data to database
                                                        $.ajax({
                                                            url: "<?php echo site_url('magazzino/distributoreAdd') ?>",
                                                            type: "POST",
                                                            data: {
                                                                nome: $('#nome').val(),
                                                                indirizzo: $('#indirizzo').val(),
                                                                citta: $('#citta').val(),
                                                                cap: $('#cap').val(),
                                                                telefono: $('#telefono').val(),
                                                                email: $('#email').val(),
                                                                piva: $('#p_iva').val(),
                                                                percentuale: $('#percentuale_sconto').val(),
                                                                referente: $('#referente').val(),
                                                                emailReferente: $('#emailReferente').val(),
                                                                telefonoReferente: $('#telefonoReferente').val()
                                                            },
                                                            dataType: "json",
                                                            success: function (validation)
                                                            {
                                                                if (validation) //if success close modal and reload ajax table
                                                                {
                                                                    $('#myModal_distributore').modal('hide');
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
                                                            placeholder: "Seleziona il Fornitore",
                                                            allowClear: true
                                                        });


                                                    });
        </script>


        <div class="modal inmodal fade" id="myModal_distributore" tabindex="-1" role="dialog"  aria-hidden="true">
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
        </div>



    </body>

</html>
