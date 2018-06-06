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



        <style type="text/css">

            table {
                table-layout:auto
                    /*        word-wrap: break-word;*/
            }

            table th, table td {
                /*            overflow: hidden;*/
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
                        <h2>Lista Clienti</h2>
                    </div>
                    <!--                    <div class="col-lg-2">
                    
                                        </div>-->
                </div>


                <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="wrapper wrapper-content">

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="ibox-content" >

                                    <div class="table-responsive" >
                                        <?php
                                        if (count($data) > 0) {
                                            ?>


                                            <table class="table table-hover" style="width:100%" border="0">
                                                <thead>
<!--                                                    <tr>
                                                        <td style="width:30%;"> <input type="text" class="form-control input-sm" name="nome_txt"  value="<?php echo $nome_txt; ?>" ></td>

                                                        <td colspan="2">
                                                            <button type="submit" style="min-width:30px" class="btn btn-w-m btn-success btn-sm">Cerca</button>
                                                            <button type="reset" style="margin-left: 5px;min-width:30px" class="btn btn-w-m btn-danger btn-sm" onclick="document.location.href = '<?php echo $_SERVER['PHP_SELF']; ?>'">Reset</button>
                                                            <button type="button" style="margin-left: 5px;min-width:30px" class="btn btn-w-m btn-default btn-sm" onclick="exportExcel();">Export</button>

                                                        </td>
                                                        <td style="width:10%;text-align: right">
                                                            <button type="button" class="btn btn-primary btn-sm" onclick="autoreAdd()">Nuovo Autore</button>
                                                        </td>
                                                    </tr>-->
                                                    <tr>
                                                        <th>Cod. Cliente</th>
                                                        <th>Cod. SAP</th>
                                                        <th>Cognome Nome</th>
                                                        <th>P.Iva</th>
                                                        <th>Indirizzo</th>
                                                        <th>Città</th>
                                                        <th>Rappresentate</th>
                                                        <th>Note</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    foreach ($data as $item):
                                                        ?>
                                                        <tr>
                                                            <?php
                                                            $num = $item->id;
                                                            $str_length = 4;

                                                            $myID = substr("0000{$num}", -$str_length);
                                                            ?>

                                                            <td><?php echo $myID; ?></td>
                                                            <td><?php echo $item->codice_sap; ?></td>
                                                            <?php
                                                            
                                                            $cognome = "";
                                                            if ($item->cognome != "") {
                                                                $cognome = $item->cognome . " / " ;
                                                            }
                                                            ?>

                                                            <td style="width:2%"><?php echo $cognome . $item->nome; ?> </td>

                                                            
                                                            <td><?php echo $item->p_iva; ?></td>
                                                            <td><?php echo $item->indirizzo; ?></td>
                                                            <td><?php echo $item->citta; ?></td>
                                                            <td><?php echo $item->rappresentante; ?></td>
                                                            <td><?php echo date("d/m/Y", strtotime($item->data_inserimento_riga)); ?></td>
                                                            
                                                            <td  style="text-align:right">
                                                                <button type="button" class="btn btn-default btn-sm" onclick="autoreEdit(<?php echo $item->id; ?>)">
                                                                    <span class="glyphicon glyphicon-pencil " aria-hidden="true"></span>
                                                                </button>
                                                                <button type="button" class="btn btn-danger btn-sm" onclick="autoreDel(<?php echo $item->id; ?>)">
                                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"  ></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>   


                                                </tbody>
                                            </table>

                                            <?php
                                        } else {

                                            echo "<h4 style=\"text-align:center\">Nessun autore trovato</h4>";
                                        }
                                        ?>  
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <?php echo $pagination; ?>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="footer">
                    <div class="pull-right">
                        10GB of <strong>250GB</strong> Free.
                    </div>
                    <div>
<!--                        <strong>Copyright</strong> Example Company &copy; 2014-2017-->
                        
                          <img alt="image"  height="20" src="<?php echo base_url('assets/img/LogoMediaedit.png'); ?>" />
                    </div>
                </div>

            </div>
        </div>







        <form action="#" id="form" class="form-horizontal">
            <div class="modal inmodal fade" id="myModal_autore" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <input type="hidden" class="form-control" id="idAutore" name="idAutore">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h2 class="modal-title">Nuovo Distributore</h2>
                        </div>
                        <div class="modal-body" style="height:240px">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Nominativo</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nominativo">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Descrizione</label>
                                    <input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="Descrizione">
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
        </form>



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


                                var save_method;

                                function autoreAdd()
                                {
                                    save_method = 'add';
                                    $('#form')[0].reset(); // reset form on modals
                                    $('.modal-title').text('Aggiungi Autore');
                                    $('#myModal_autore').modal('show'); // show bootstrap modal
                                }


                                function autoreEdit(id)
                                {
                                    save_method = 'update';
                                    //$('#form')[0].reset(); // reset form on modals

                                    //Ajax Load data from ajax
                                    $.ajax({
                                        url: "<?php echo site_url('magazzino/getAutoreById/') ?>/" + id,
                                        type: "GET",
                                        dataType: "JSON",
                                        success: function (data)
                                        {

                                            $('[name="idAutore"]').val(data[0].id);
                                            $('[name="nome"]').val(data[0].nome);
                                            $('[name="descrizione"]').val(data[0].descrizione);
                                            $('#myModal_autore').modal('show'); // show bootstrap modal when complete loaded
                                            $('.modal-title').text('Modifica Autore'); // Set title to Bootstrap modal title

                                        },
                                        error: function (jqXHR, textStatus, errorThrown)
                                        {
                                            alert('Error get data from ajax');
                                        }
                                    });
                                }


                                function save()
                                {
                                    $('#btnSave').text('saving...'); //change button text
                                    $('#btnSave').attr('disabled', true); //set button disable 

                                    var url;

                                    if (save_method === 'add') {
                                        url = "<?php echo site_url('magazzino/autoreAdd') ?>";
                                    } else {
                                        url = "<?php echo site_url('magazzino/autoreUpdate') ?>";
                                    }

                                    // ajax adding data to database
                                    $.ajax({
                                        url: url,
                                        type: "POST",
                                        data: {
                                            idAutore: $('#idAutore').val(),
                                            nome: $('#nome').val(),
                                            descrizione: $('#descrizione').val()

                                        },
                                        dataType: "json",
                                        success: function (validation)
                                        {
                                            if (validation) //if success close modal and reload ajax table
                                            {
                                                $('#myModal_autore').modal('hide');
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



                                function autoreDel(idAutore)
                                {
                                    if (confirm('Sei sicuro di voler cancellare questo autore?'))
                                    {
                                        // ajax delete data to database
                                        $.ajax({
                                            url: "<?php echo site_url('magazzino/autoreDelete/') ?>/" + idAutore,
                                            type: "POST",
                                            dataType: "JSON",
                                            success: function (data)
                                            {
                                                //if success reload ajax table
                                                $('#myModal_autore').modal('hide');
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



                                function exportExcel(tipo)
                                {

                                    document.form1.action = "<?php echo base_url("report/"); ?>" + tipo;
                                    document.form1.submit();
                                }





                                $(document).ready(function () {
                                    $('.i-checks').iCheck({
                                        checkboxClass: 'icheckbox_square-green',
                                        radioClass: 'iradio_square-green',
                                    });
                                });
        </script>

    </body>

</html>
