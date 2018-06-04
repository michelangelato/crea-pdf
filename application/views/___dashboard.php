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

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url('assets/vendor/morrisjs/morris.css'); ?>" rel="stylesheet">

          <!-- Custom Fonts -->
        <link href="<?php echo base_url('assets/vendor/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css'); ?>" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <?php $this->view('menu'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">

                    <div class="col-lg-4">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
                            </div>
                            <div class="panel-body">
                                <div id="corsi"></div>
                                <a href="#" class="btn btn-default btn-block">View Details</a>
                            </div>
                        </div>

                    </div>
                    <!-- /.col-lg-8 -->
                    <div class="col-lg-8">

                        dddddddd

                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

       
        
        
        
        
        
        <!-- jQuery -->
        <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>

        <!-- Morris Charts JavaScript -->
        <script src="<?php echo base_url('assets/vendor/raphael/raphael.min.js'); ?>"></script>
        
        <script src="<?php echo base_url('assets/vendor/morrisjs/morris.min.js'); ?>"></script>
        
<!--    <script src="<?php echo base_url('assets/data/morris-data.js'); ?>"></script>-->

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>


         <script>

            $(document).ready(function () {

                Morris.Donut({
                    element: 'corsi',
                    data: [
                        {label: "Download Sales", value: 12},
                        {label: "In-Store Sales", value: 30},
                        {label: "Mail-Order Sales", value: 20}
                    ]
                });

            });

        </script>   


    </body>

</html>
