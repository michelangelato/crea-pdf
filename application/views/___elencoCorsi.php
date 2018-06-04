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


        <!-- bootstrap select  -->
        <link href="<?php echo base_url('assets/vendor/bootstrap-select/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css">

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

                        <form name="modulo" method="post"> 


                            <button type="button" class="btn btn-primary" onclick="corsoAdd();" style="float:right;margin-top: 10px;margin-left: 10px;">Nuovo Corso</button>

                            <select name="categoria" id="categoria" class="form-control" data-width="auto" style="width: 150px;float:right;margin-top: 10px;" onchange="selectPost()">
                                <option value="">-- Tutti --</option>
                                <?php
                                foreach ($categoria as $item):

                                    if ($categoriaFiltro == $item->id) {
                                        ?>
                                        <option selected value="<?php echo $item->id; ?>"><?php echo $item->nome_ITA; ?></option>

                                    <?php } ?>
                                    <option value="<?php echo $item->id; ?>"><?php echo $item->nome_ITA; ?></option>
                                    <?php
                                endforeach;
                                ?>

                            </select>
                        </form>


                        <h3 class="page-header" style="margin: 20px 0 10px">Prossimi Corsi</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="panel panel-default">
                            <!--                        <div class="panel-heading">
                                                        Striped Rows
                                                    </div>-->
                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <?php
                                if (count($data) > 0) {
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Titolo</th>
                                                    <th>Categoria</th>
                                                    <th>Destinatari</th>
                                                    <th>Trainer</th>
                                                    <th>Inizio</th>
                                                    <th style="width:7%"></th>
                                                    <th style="width:9%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                
                                                foreach ($data as $item):
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $item->id; ?></td>
                                                        <td><?php echo $item->titolo; ?></td>
                                                        <td><?php echo $item->categoria; ?></td>
                                                        <td><?php echo $item->destinatari; ?></td>
                                                        <td><?php echo $item->trainer; ?></td>

                                                        <?php
                                                        if ($item->data == '-') {
                                                            $data = '<span class="badge badge-secondary alert-warning" >Inserire date</span>';
                                                        } else {

                                                            $txtSaveTheDatte = "";

                                                            foreach ($item->saveTheDate as $value) {

                                                                $txtSaveTheDatte .= str_replace(",", ", ", $value->saveTheDate) . "<br><br>";
                                                            }

                                                            $data = $item->data . ' ' . '<a href="#" disabled="true" style="color:#000;cursor: pointer;" onclick="return false" data-html="true" data-trigger="hover" class="btn btn-lg" data-toggle="popover" title="Save The Date" data-content="' . $txtSaveTheDatte . '"><i class="fas fa-calendar-alt"></i></a>';
                                                        }
                                                        ?>

                                                        <td><?php echo $data; ?></td>

                                                        <td>
                                                             <?php
                                                        if ($item->data != '-') { ?>
                                                              <button type="button" onclick="prenotazioni(<?php echo $item->id; ?>)" class="btn btn-outline btn-primary btn-sm">Prenotazioni <span class="badge"><?php echo $item->prenotazioni; ?></span></button>

                                                        <?php } 
                                                        ?>
                                                            
                                                        </td>


                                                        <td>  
                                                            <button type="button" class="btn btn-default btn-sm" onclick="corsoEdit(<?php echo $item->id; ?>)">
                                                                <span class="glyphicon glyphicon-pencil " aria-hidden="true"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="corsoDel(<?php echo$item->id; ?>)">
                                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"  ></span>
                                                            </button>

                                                        </td>
                                                    </tr>
    <?php endforeach; ?>   
                                            </tbody>
                                        </table>
                                    </div>

    <?php
} else {

    echo "<h4 style=\"text-align:center\">Nessun corso previsto</h4>";
}
?>


                                <!-- /.table-responsive -->
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

                                                        $(function () {
                                                            $('[data-toggle="popover"]').popover()
                                                        })


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


                                                        function corsoEdit(idCorso)
                                                        {
                                                            document.location.href = '<?php echo site_url('corsi/edit/'); ?>' + idCorso;
                                                        }

                                                        function corsoAdd()
                                                        {
                                                            document.location.href = '<?php echo site_url('corsi/newCorso/'); ?>';
                                                        }


                                                        function selectPost()
                                                        {
                                                            document.modulo.method = "post";
                                                            document.modulo.action = "<?php $_SERVER['PHP_SELF']; ?>";
                                                            document.modulo.submit();
                                                        }
                                                        
                                                        
                                                        function prenotazioni(idCorso)
                                                        {
                                                            document.location.href = '<?php echo site_url('corsi/prenotazioni/'); ?>' + idCorso;
                                                        }


        </script>





    </body>

</html>
