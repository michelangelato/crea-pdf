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

    </head>

    <body>

        <div id="wrapper">

            <?php $this->view('menu_sx'); ?>
            <div id="page-wrapper" class="gray-bg">

                <?php $this->view('menu_top'); ?>
                
                
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Carico Magazzino</h2>
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
<!--                    <div class="col-lg-2">

                    </div>-->
                </div>
                <div class="wrapper wrapper-content animated fadeInRight">

                    <div class="row">
                        <div class="col-lg-12">
                            

<!--                            <div class="ibox float-e-margins">
                                                                <div class="ibox-title">
                                                                    <h5>Hover Table  </h5>
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
                            </div>-->
                            <div class="ibox-content">

                                <?php
                                if (count($data) > 0) {
                                    ?>


                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Isbn</th>
                                                <th>Fornitore</th>
                                                <th>Titolo</th>
                                                <th>Editore</th>
                                                <th>Autore</th>
                                                <th>Quantità</th>
                                                <th>Prezzo Listino</th>
                                                <th>Documento Carico Listino</th>
                                                <th>Modifica</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($data as $item):
                                                ?>
                                                <tr>
                                                    <td><img src="<?php echo $item->image; ?>" style="width:40px;" alt="<?php echo $item->image; ?>"></td>
                                                    <td><?php echo $item->isbn; ?></td>
                                                    <td><?php echo $item->distributore; ?></td>
                                                    <td><?php echo $item->titolo; ?></td>
                                                    <td><?php echo $item->casa_editrice; ?></td>
                                                    <td><?php echo $item->autore; ?></td>
                                                    <td><?php echo $item->quantita; ?></td>
                                                    <td><?php echo $item->prezzo; ?></td>
                                                    <td><?php echo $item->documento_carico; ?></td>
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
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

</body>

</html>
