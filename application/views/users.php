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
                        <h2>Lista Utenti</h2>

                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
                <div class="wrapper wrapper-content animated fadeInRight">


                    <div class="row">
                        <div class="col-lg-12">

                            <div class="ibox float-e-margins">
                                <input type="hidden"  class="form-control" id="idArticoloInVisione" value="">
                                <input type="hidden"  class="form-control" id="idCliente" value="">
                            </div>

                            <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                                <div class="ibox-content">

                                     <?php
                    if(!empty($userRecords))
                    {
                                        ?>


                                        <table class="table table-hover" border="0">
                                            <thead>
                                                
                                                 <tr>
                                                    <td></td>
                                                    <td> <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" placeholder="Search"/></td>
                                                    <td colspan="3"><button type="submit" style="min-width:40px" class="btn btn-w-m btn-success btn-sm">Cerca</button>
                                                        <button type="reset" style="margin-left: 5px;min-width:40px" class="btn btn-w-m btn-danger btn-sm" onclick="document.location.href = '<?php echo $_SERVER['PHP_SELF']; ?>'">Reset</button>
                                                        <button type="button" style="margin-left: 5px;min-width:40px" class="btn btn-w-m btn-default btn-sm" onclick="exportExcel();">Export</button>

                                                    </td>
                                                         <td style="width:16%; text-align: right">
                                                              <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>addNew"><i class="fa fa-plus"></i> Nuovo Utente</a>
                                                        </td>
                                                </tr>
                                                <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Role</th>
                      <th class="text-center"></th>
                    </tr>
                    <?php
                   
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->userId ?></td>
                      <td><?php echo $record->name ?></td>
                      <td><?php echo $record->email ?></td>
                      <td><?php echo $record->mobile ?></td>
                      <td><?php echo $record->role ?></td>
                      <td  style="text-align: right">
                          <a class="btn btn-sm btn-primary" href="<?= base_url().'login-history/'.$record->userId; ?>" title="Login history"><i class="fa fa-history"></i></a> | 
                          <a class="btn btn-default btn-sm" href="<?php echo base_url().'editOld/'.$record->userId; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                          
                          <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->userId; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    
                           ?>                    


                                            </tbody>
                                        </table>

                                        <?php
                                    } else {
                                        echo "<h4 style=\"text-align:center\">Nessun libro in lista magazzino</h4>";
                                    }
                                    ?>  


                                </div>

                            </form>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?php echo $this->pagination->create_links(); ?>
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

        <script type="text/javascript">



                                                        function exportExcel()
                                                        {
                                                            document.form1.action = "<?php echo base_url("report/listaMagazzino"); ?>";
                                                            document.form1.submit();
                                                        }


                                                        




    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
    
    
    
    
    
    
    
    jQuery(document).ready(function(){
	
	jQuery(document).on("click", ".deleteUser", function(){
		var userId = $(this).data("userid"),
			hitURL = "<?php echo base_url(); ?>" + "deleteUser",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this user ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully deleted"); }
				else if(data.status = false) { alert("User deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
});


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