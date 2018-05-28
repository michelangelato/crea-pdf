<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>INSPINIA | Static Tables</title>

        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/plugins/iCheck/custom.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/animate.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">


        <style>

            /*.modal-dialog {
              width: 70%;
              height: 90%;
              padding: 0;
            }
            
            .modal-content {
              min-height: 100%;
              height:auto;
              border-radius: 0;
            }*/

        </style>

    </head>

    <body>

        <div id="wrapper">

            <?php $this->view('menu_sx'); ?>
            <div id="page-wrapper" class="gray-bg">

                <?php $this->view('menu_top'); ?>

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Lista Magazzino</h2>

                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
                <div class="wrapper wrapper-content animated fadeInRight">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="ibox collapsed">
                                <div class="ibox-title">
                                    <h5>Ricerca</h5>
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
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
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
                                <input type="text"  class="form-control" id="idArticoloInVisione" value="">
                                <input type="text"  class="form-control" id="idCliente" value="">
                            </div>
                            <div class="ibox-content">










                                <?php
                                if (count($data) > 0) {
                                    ?>


                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Isbn</th>
                                                <th>Titolo</th>
                                                <th>Editore</th>
                                                <th>Anno Edizione</th>
                                                <th>Autore</th>
                                                <th>Quantità</th>
                                                <th>Prezzo Listino</th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td> <input type="text" class="form-control input-sm" id="isbn_txt"  value="" placeholder="isbn"></td>
                                                <td> <input type="text" class="form-control input-sm" id="isbn_txt"  value="" placeholder="isbn"></td>
                                                <td> <input type="text" class="form-control input-sm" id="isbn_txt"  value="" placeholder="isbn"></td>
                                                <td> <input type="text" class="form-control input-sm" id="isbn_txt"  value="" placeholder="isbn"></td>
                                                <td> <input type="text" class="form-control input-sm" id="isbn_txt"  value="" placeholder="isbn"></td>
                                                <td> <input type="text" class="form-control input-sm" id="isbn_txt"  value="" placeholder="isbn"></td>
                                                <td> <input type="text" class="form-control input-sm" id="isbn_txt"  value="" placeholder="isbn"></td>
                                                <td><button type="button" class="btn btn-w-m btn-success btn-sm">Cerca</button></td>
                                                <td></td>
                                            </tr>


                                            <?php
                                            foreach ($data as $item):
                                                ?>
                                                <tr>
                                                    <td><img src="<?php echo $item->image; ?>" style="width:40px;"></td>
                                                    <td><?php echo $item->isbn; ?></td>
                                                    <td><?php echo $item->titolo; ?></td>
                                                    <td style="text-align:center"><?php echo $item->casa_editrice; ?></td>
                                                    <td style="text-align:center"><?php echo $item->edizione; ?></td>
                                                    <td style="text-align:center"><?php echo $item->autore; ?></td>
                                                    <td style="text-align:center"><?php echo $item->quantita; ?></td>
                                                    <td style="text-align:center"><?php echo $item->prezzo; ?></td>
                                                    <td>
                                                        <button type="button"  style="margin-top: 5px;" class="btn btn-primary btn-xs" onclick="openModalPortaInVisione(<?php echo $item->id; ?>)">
                                                            Porta In Visione
                                                        </button>


                                                    </td>
                                                    <td></td>
                                                </tr>
                                            <?php endforeach; ?>   


                                        </tbody>
                                    </table>

                                    <?php
                                } else {
                                    echo "<h4 style=\"text-align:center\">Nessun libro in lista magazzino</h4>";
                                }
                                ?>  


                            </div>



                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?php echo $pagination; ?>
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
        <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js'); ?>"></script>

        <!-- Peity -->
        <script src="<?php echo base_url('assets/js/plugins/peity/jquery.peity.min.js'); ?>"></script>

        <!-- Custom and plugin javascript -->
        <script src="<?php echo base_url('assets/js/inspinia.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js'); ?>"></script>

        <!-- iCheck -->
        <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>"></script>

        <!-- Peity -->
        <script src="<?php echo base_url('assets/js/demo/peity-demo.js'); ?>"></script>

        <script>






                                                    function portaInVisione(idCliente)
                                                    {
                                                        $('#idCliente').val(idCliente);
                                                        $('#myModal_portainvisione').modal('hide'); // show bootstrap modal

                                                        window.location = "<?php echo base_url("magazzino/portaInVisione"); ?>?idCliente=" + $('#idCliente').val() + '&idMagazzino=' + $('#idArticoloInVisione').val();

                                                    }

                                                    function openModalPortaInVisione(idArticolo)
                                                    {

                                                        $('#idArticoloInVisione').val(idArticolo);
                                                        $('#myModal_portainvisione').modal('show'); // show bootstrap modal
                                                    }





        </script>

        <div class="modal inmodal fade" id="myModal_portainvisione" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h2 class="modal-title">Cerca Cliente</h2>
                    </div>
                    <div class="modal-body" >

                        <?php $this->view('magazzino/elencoClientiAjax.php'); ?>

                    </div>
                    <div class="modal-footer" style="border-top: 0px">
                    </div>
                </div>
            </div>

    </body>

</html>
s