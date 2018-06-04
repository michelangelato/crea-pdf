<html>
    <head>
        <title>Ajax JQuery Pagination in Codeigniter using Bootstrap</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <style>
            
            #country_table_contenitore{
                display: none;
            } 
            
        </style>
    </head>
    <body>
        <div class="container box">
            <h3 align="center">Ajax JQuery Pagination in Codeigniter using Bootstrap</h3>
            <input type="text" class="form-control input-sm  blog_search_text" id="nome" placeholder="Cerca per parola chiave tra Nome, Cognome, P. Iva">
            <button type="button" class="btn btn-primary blog_search_submit btn-sm" id="btnSave" style="float:left;bottom: 0px;" >Search</button>
            
            <div id="country_table_contenitore">
            <div align="right" id="pagination_link"></div>
            <div class="table-responsive" id="country_table"></div>
            </div>
            
            
        </div>
    </body>
</html>
<script>




    $(document).ready(function () {


        // Search
        $('body').on('click', '.blog_search_submit', function () {
            load_country_data(1);
        });


        function load_country_data(page)
        {
            
            $('#country_table_contenitore').show();
            
            var data = {
                page: page,
                search: $('.blog_search_text').val()
            };

            $.ajax({
                url: "<?php echo base_url(); ?>clienteAjax/pagination/" + page,
                data: {
                    search: $('.blog_search_text').val()

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


// function load_country_data(page)
// {
//  $.ajax({
//   url:"<?php echo base_url(); ?>cliente1/pagination/"+page,
//   method:"GET",
//   dataType:"json",
//   success:function(data)
//   {
//    $('#country_table').html(data.country_table);
//    $('#pagination_link').html(data.pagination_link);
//   }
//  });
// }







       // load_country_data(1);

        $(document).on("click", ".pagination li a", function (event) {
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_country_data(page);
        });

    });
</script>