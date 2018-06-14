<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>INSPINIA | Static Tables</title>

        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/animate.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/plugins/select2/select2.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/plugins/datapicker/datepicker3.css'); ?>" rel="stylesheet">

        <style>
            #magazzino_table_contenitore{
                display: none;
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
                        <h2>Stai portando in visione un libro</h2>
                    </div>

                </div>
                <!--                <div class="wrapper wrapper-content animated fadeInRight">-->
                <div class="wrapper wrapper-content">

                    <input type="hidden"  class="form-control" id="idArticoloInVisione" value="">
                    <input type="hidden"  class="form-control" id="idCliente" value="<?php echo $cliente[0]->id; ?>">

                    
                    <div class="ibox-title" style="text-align:right">
                                  <button type="button" class="btn btn-primary btn-sm" onclick="casaEditriceAdd()">Porta In Visione</button>
                   </div>
                    
                    
                    
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox collapsed">
                                <div class="ibox-title">
                                    <h5>Dati del Cliente: <?php echo $cliente[0]->nome; ?></h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
<!--                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>-->
<!--                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#">Config option 1</a>
                                            </li>
                                            <li><a href="#">Config option 2</a>
                                            </li>
                                        </ul>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>-->
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:20%">Nome</th>
                                                <th>Cognome</th>
                                                <th>P. Iva</th>
                                                <th>Codice Fiscale</th>
                                                <th>Indirizzo</th>
                                                <th>Cap</th>
                                                <th>Città</th>
                                                <th>Telefono</th>
                                                <th>Cellulare</th>
                                                <th>E-mail</th>
                                                <th>Note</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $cliente[0]->nome; ?></td>
                                                <td><?php echo $cliente[0]->cognome; ?></td>
                                                <td><?php echo $cliente[0]->p_iva; ?></td>
                                                <td><?php echo $cliente[0]->codice_fiscale; ?></td>
                                                <td><?php echo $cliente[0]->indirizzo; ?></td>
                                                <td><?php echo $cliente[0]->cap; ?></td>
                                                <td><?php echo $cliente[0]->citta; ?></td>
                                                <td><?php echo $cliente[0]->fisso; ?></td>
                                                <td><?php echo $cliente[0]->cellulare; ?></td>
                                                <td><?php echo $cliente[0]->email; ?></td>
                                                <td><?php echo $cliente[0]->ragione_sociale; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>



                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Cerca Articolo</h5>
                                </div>
                                <div class="ibox-content">
                                    <?php $this->view('magazzino/elencoMagazzinoAjax.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  LIBRI SELEZIONATI-->
                    <div class="row">
                        <div class="col-lg-8">

                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Libri Aggiunti</h5>
                                </div>
                                <div class="ibox-content" >
                                    <table class="table" id="myTable">
                                        <thead>
                                            <tr>
                                                <th style="width:20%">Isbn</th>
                                                <th>Titolo</th>
                                                <th>Editore</th>
                                                <th>Quantità</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>  
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">  

                            <div class="ibox-content">
                                <div class="form-group">
                                    <label class="control-label" id ="labelTipoContenuto">Rappresentante</label>

                                    <select class="select2_demo_3 form-control" name="idContenutoTipo" id="idContenutoTipo" style="width:100%">
                                        <option></option>
                                        <?php
                                        foreach ($rapprensentati as $item):
                                            ?>
                                            <option <?php echo ($item->id == $cliente[0]->id_rappresentante) ? 'selected' : ''; ?> value="<?php echo $item->id; ?>" data-tokens="<?php echo $item->nome; ?>"  ><?php echo $item->nome; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>

                                </div>


                            </div>


                            <div class="ibox-content" style="margin-top:20px;">
                                <div class="form-group">
                                    <label class="control-label" id ="labelDocumentoCarico">Documento di Carico</label>
                                    <input type="text" class="form-control" name="documentoCarico" id="documentoCarico" value="<?php echo $numBollaVisione[0]->id; ?>" >
                                    <label class="control-label" id ="labelDataCarico">Data di Carico</label>

                                    <div class="input-group date">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" name="dataCarico" id="dataCarico"> 
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

        <!--         iCheck 
                <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>"></script>
        
                 Peity 
                <script src="<?php echo base_url('assets/js/demo/peity-demo.js'); ?>"></script>-->

        <!-- Select2 -->
        <script src="<?php echo base_url('assets/js/plugins/select2/select2.full.min.js'); ?>"></script>

        <!-- Data picker -->
        <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.it.min.js'); ?>"></script>








        <script>


            function portaInVisione(idMagazzino)
            {
                $('#idArticoloInVisione').val(idMagazzino);
                window.location = "<?php echo base_url("cliente/portaInVisione"); ?>?idCliente=" + $('#idCliente').val() + '&idMagazzino=' + $('#idArticoloInVisione').val();
            }

            function portaInVisioneDelete(isbn)
            {
                $('#idArticoloInVisione').val(isbn);
                window.location = "<?php echo base_url("cliente/portaInVisione"); ?>?idCliente=" + $('#idCliente').val() + '&isbnDelete=' + $('#idArticoloInVisione').val();

            }


            //costruisco tabella libri selezionati per la presa visione
            libriSelezionati();

            function libriSelezionati()
            {
                $('#libriSelezionati').empty();

                $.ajax({
                    url: "<?php echo site_url('cliente/getLibriSelezionatiPerVisione/') ?>",
                    type: "GET",
                    dataType: "JSON",
                    success: function (response)
                    {

                        var c = 1;
                        $.each(response.data, function (k, v) {


                            q = 0;

                            $('#myTable tr:last').after('<tr><td>' + v[0].isbn + '</td><td>' + v[0].titolo + '</td><td>' + v[0].casa_editrice + '</td><td>' +
                                    '<select name="orario" class="form-control input-sm" style="width:60%" id="comboQuatita_'+c+'">' +
//                                '<option>1</option>' +
//                                '<option>2</option>' +
//                                '<option>3</option>' +
//                                '<option>4</option>' +
//                                '<option>5</option>' +
//                                '<option>6</option>' +
//                                '<option>7</option>' +
//                                '<option>8</option>' +
//                                '<option>9</option>' +
//                                '<option>10</option>' +
//                                '<option>11</option>' +
                                    '</select>' +
                                    '</td>' +
                                    '<td><a href="#" class="itemDelete"><i class="fa fa-trash fa-2x" style ="cursor: pointer;"  aria-hidden="true" onclick="portaInVisioneDelete(' + v[0].isbn + ');"></i></a></td>' +
                                    '</tr>'
                                    );
                            
                            var q = v[0].quantita;
                            var sel = document.getElementById('comboQuatita_'+c);
                          
                            var opt = null;

                            for (i = 1; i <=  q; i++) {
                                console.log(v[0].quantita);
                                console.log(i);
                                opt = document.createElement('option');
                                opt.value = i;
                                opt.innerHTML =  i;
                                sel.appendChild(opt);
                            }
                            
                          
                          c++;
                        });
//                        $.each(response.data, function (k, v) {
//
//                            console.log(v[0]);
//
//                            var addLi = '<li class="ui-state-default">' +
//                                    '<div id="div2" style="margin: 0px; display: inline-block;width:86.99%; border: 0px solid red;">' +
//                                    '<div>' + v[0].isbn + '</div>' +
//                                    '<div>' + v[0].titolo + '</div>' +
//                                    '<div>' + v[0].casa_editrice + '</div>' +
//                                    '</div>' +
//                                    '<div id="div3" style="margin: 10px; display: inline-block; width:2%;border: 0px solid blue;vertical-align: top; margin-top: 12px;">' +
//                                    '<a href="#" class="itemDelete"><i class="fa fa-trash fa-2x" style ="cursor: pointer;"  aria-hidden="true" onclick="removeRowDb(' + v[0].id + ');"></i></a>' +
//                                    '</div>' +
//                                    '</li>';
////                                                    //var addLi = v[0].isbn + ' --- ' + v[0].autore + '<br>';
////
//                            jQuery('#libriSelezionati').append(addLi);
//
//                        });

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });
            }


            $('.date').datepicker({
                language: 'it-IT',
                format: 'dd/mm/yyyy'

            });

            $(".date").datepicker('setDate', new Date());

            function cercaArticolo()
            {
                $.ajax({
                    url: "<?php echo site_url('magazzino/cercaArticolo') ?>",
                    type: "POST",
                    data: {
                        isbn: $('#isbn').val(),
                        titolo: $('#titolo').val(),
                        prezzo: $('#prezzo').val(),
                        documentoCarico: $('#documentoCarico').val()
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

        </script>







        <script>
//            script ricerca ajax magazzino


            function resetForm() {
                $('#isbn').val('');
                $('#titolo').val('');
                $('#prezzo').val('');
                $('#documentoCarico').val('');
                $('#magazzino_table_contenitore').hide();
            }



            $(document).ready(function () {
                // Search
                $('body').on('click', '.blog_search_submit', function () {
                    load_country_data(1);
                });


                function load_country_data(page)
                {

                    $('#magazzino_table_contenitore').show();


//            var data = {
//                page: page,
//                search: $('.blog_search_text').val()
//            };

                    $.ajax({
                        url: "<?php echo base_url(); ?>magazzinoAjax/pagination/" + page,
                        data: {
                            isbn: $('#isbn').val(),
                            titolo: $('#titolo').val(),
                            prezzo: $('#prezzo').val(),
                            documentoCarico: $('#documentoCarico').val()

                        },
                        method: "POST",
                        dataType: "json",
                        success: function (data)
                        {
                            $('#country_table').html(data.country_table);
                            $('#pagination_link').html(data.pagination_link);
                        }
                    });
                }


                $(document).on("click", ".pagination li a", function (event) {
                    event.preventDefault();
                    var page = $(this).data("ci-pagination-page");
                    load_country_data(page);
                });

            });
        </script>










    </body>

</html>
