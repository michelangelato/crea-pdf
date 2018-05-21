<!--<!DOCTYPE html>
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


-->        <style>
    .cvf_pag_loading {padding: 20px;}
    .cvf-universal-pagination ul {margin: 0; padding: 0;}
    .cvf-universal-pagination ul li {display: inline; margin: 3px; padding: 4px 8px; background: #FFF; color: black; }
    .cvf-universal-pagination ul li.active:hover {cursor: pointer; background: #1E8CBE; color: white; }
    .cvf-universal-pagination ul li.inactive {background: #7E7E7E;}
    .cvf-universal-pagination ul li.selected {background: #1E8CBE; color: white;}


</style><!--

</head>

<body>-->



<!-- <article class="navbar-form navbar-left">
    <div class="form-group">
        <input type="text" class="form-control blog_search_text" placeholder="Enter a keyword">
    </div>
    <input type = "submit" value = "Search" class = "btn btn-primary blog_search_submit" />
</article>-->

<div class="form-row" style="border:0px solid green;">
    <div class="form-group col-md-8" style="border:0px solid red;">
<!--        <label for="inputEmail4">Nome</label>-->
        <input type="text" class="form-control input-sm  blog_search_text" id="nome" placeholder="Cerca per parola chiave tra Nome, Cognome, P. Iva">
<!--                              <input type = "submit" value = "Search" class = "btn btn-primary blog_search_submit" />-->


    </div>
    <div class="form-group col-md-4" style="border:0px solid blueviolet;margin-bottom: 0px;">
        <button type="button" class="btn btn-primary blog_search_submit btn-sm" id="btnSave" style="float:left;bottom: 0px;" >Search</button>
    </div>
</div>       
<div class="form-row">
    <div class="form-group col-md-12" style="margin-bottom: 0px;">
        <div class="hr-line-dashed"></div>
    </div>
</div>




<div>
    <div class="cvf_pag_loading">
        <div class = "cvf_universal_container">
            <div class="cvf-universal-content"></div>
        </div>
    </div>
</div>                     


<!--
                                
         Mainly scripts 
        <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js'); ?>"></script>

         Peity 
        <script src="<?php echo base_url('assets/js/plugins/peity/jquery.peity.min.js'); ?>"></script>

         Custom and plugin javascript 
        <script src="<?php echo base_url('assets/js/inspinia.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js'); ?>"></script>

         iCheck 
        <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>"></script>

         Peity 
        <script src="<?php echo base_url('assets/js/demo/peity-demo.js'); ?>"></script>-->



<script type="text/javascript">



    function cvf_load_all_posts(page) {
        // Start the transition
        $(".cvf_pag_loading").fadeIn().css('background', '#ccc');

        // Data to receive from our controller
        var data = {
            page: page,
            search: $('.blog_search_text').val()
        };

        // Send the data
        $.post("<?php echo base_url('cliente/index_display') ?>", data, function (response) {
            // If successful Append the data into our html container
            $(".cvf_universal_container").html(response);
            // End the transition
            $(".cvf_pag_loading").css({'background': 'none', 'transition': 'all 1s ease-out'});
        });
    }

// Load page 1 as the default
    cvf_load_all_posts(1);

// Handle the clicks
    $('body').on('click', '.cvf_universal_container .cvf-universal-pagination li.active', function () {
        var page = $(this).attr('p');
        cvf_load_all_posts(page);

    });

// Search
    $('body').on('click', '.blog_search_submit', function () {
        cvf_load_all_posts(1);
    });


</script>
<!--        
        
       



        

    </body>

</html>
<script>
    
function searchFilter(page_num) {
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>cliente/ajaxPaginationData/'+page_num,
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (html) {
            $('#postList').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}

</script>-->