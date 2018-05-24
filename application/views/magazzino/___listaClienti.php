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


        <div class="container box">
            <h3 align="center">Ajax JQuery Pagination in Codeigniter using Bootstrap</h3>
            <div align="right" id="pagination_link"></div>
            <div class="table-responsive" id="country_table"></div>
        </div>














    </body>

</html>
<input type="submit" value="" />

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
        function load_country_data(page)
        {
            $.ajax({
                url: "<?php echo base_url(); ?>cliente/pagination/" + page,
                method: "GET",
                dataType: "json",
                success: function (data)
                {
                    $('#country_table').html(data.country_table);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
        }

        load_country_data(1);

        $(document).on("click", ".pagination li a", function (event) {
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_country_data(page);
        });







    });


    function portaInVisione()
    {
        $('#myModal_portainvisione').modal('show'); // show bootstrap modal
    }





</script>



