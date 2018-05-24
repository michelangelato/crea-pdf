
        <style>
            
            #country_table_contenitore{
                display: none;
            } 
            
            
        </style>
    
        

            <input type="text" class="form-control input-sm  blog_search_text" id="nome" placeholder="Cerca per parola chiave tra Nome, Cognome, P. Iva">
            <button type="button" class="btn btn-primary blog_search_submit btn-sm" id="btnSave" style="float:left;bottom: 0px;margin-top: 10px;" >Search</button>

            <div id="country_table_contenitore">
            <div align="right" id="pagination_link"></div>
            <div class="table-responsive" id="country_table"></div>
            </div>
        
        
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


        $(document).on("click", ".pagination li a", function (event) {
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_country_data(page);
        });

    });
</script>