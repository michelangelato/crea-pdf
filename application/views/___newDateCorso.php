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


        <!-- bootstrap select  -->
        <link href="<?php echo base_url('assets/vendor/bootstrap-select/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link href="<?php echo base_url('assets/vendor/bootstrap-toggle/css/bootstrap-toggle.min.css'); ?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('assets/vendor/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css'); ?>" rel="stylesheet" type="text/css">

        <!-- jQuery -->
        <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>


        <script src="<?php echo base_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.it.min.js'); ?>"></script>


        <style>
            .form-group {
                margin-bottom: 5px;
            }

            @media (min-width: 768px){
                .seven-cols .col-md-1,
                .seven-cols .col-sm-1,
                .seven-cols .col-lg-1  {
                    width: 100%;
                    *width: 100%;
                }
            }

            @media (min-width: 992px) {
                .seven-cols .col-md-1,
                .seven-cols .col-sm-1,
                .seven-cols .col-lg-1 {
                    width: 14.285714285714285714285714285714%;
                    *width: 14.285714285714285714285714285714%;
                }
            }

            /**
             *  The following is not really needed in this case
             *  Only to demonstrate the usage of @media for large screens
             */    
            @media (min-width: 1200px) {
                .seven-cols .col-md-1,
                .seven-cols .col-sm-1,
                .seven-cols .col-lg-1 {
                    width: 14.285714285714285714285714285714%;
                    *width: 14.285714285714285714285714285714%;
                }
            }




            ul, li{
                margin: 0;
                padding: 0;
            }
            #sortable-row { list-style:none; display: list-item; width: 100%; border: 0px solid red;}

            #sortable-row li { margin-bottom:4px; padding:0px;cursor:move; width: 100%; }
            #sortable-row li.ui-state-highlight { height: 0em;border:#ccc 2px dotted;
                                                  list-style-position:inside;
                                                  margin:0;
                                                  padding:0; width: 100%; }






            .modal-dialog {
                width: 100%;
                height: 100%;
                padding: 0;
            }

            .modal-content {
                height: 100%;
                border-radius: 0;
            }

        </style>



    </head>

    <body>




        <div id="wrapper">

            <?php $this->view('menu'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">













                        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary" style="float:right;margin-top: 10px; margin-left: 10px">Save</button>
                        <h3 class="page-header" style="margin: 20px 0 10px"><a href="<?php echo site_url('corsi/edit/') . $corso[0]->id; ?>" style="text-decoration : none; color : #000; "><?php echo $corso[0]->titolo_ITA; ?></a></h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <input type="hidden" value="<?php echo $corso[0]->id; ?>" id="idCorso" name="idCorso"/>

                        <div class="row">

                            <div class="col-lg-12"> 


                                <input type="hidden" name="nextId" id="nextId" value="">
                                <input type="hidden" id="gruppo" value="">


                                <div class="row">
                                    <div class="form-group col-md-3">
<!--                                       
                                        <input type="text" class="form-control date" placeholder="fai click per scegliere le date..." id="dateCorso" value="">-->

                                        <div class="input-group date" data-provide="datepicker">
                                            <input type="text" class="form-control" id="dateCorso">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group col-md-3">
                                        <div style="float:left;width: 10%;vertical-align: middle; text-align: center" id="divAggiungi">
                                            <button type="button" class="btn btn-primary" onclick="addGiorni();">Aggiungi giornate</button>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row" style="border-top:0px solid #f0ad4e;">
                                    <div id="some_element" class="col-md-12 row seven-cols" style="border:0px solid green;top:20px;width:105%;"></div>
                                </div>

                                <!-- /.table-responsive -->

                            </div>
                        </div>

                        <!-- /.row -->
                    </div>
                    <!-- /#page-wrapper -->

                </div>
                <!-- /#wrapper -->
                </form> 


                <script src="<?php echo base_url('assets/vendor/moment/moment.js'); ?>"></script>
                <script src="<?php echo base_url('assets/vendor/moment/locale/it.js'); ?>"></script>




                <!-- Bootstrap Core JavaScript -->
                <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

                <!-- Metis Menu Plugin JavaScript -->
                <script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>

                <!-- Custom Theme JavaScript -->
                <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>


                <!-- bootstrap-select -->
                <script src="<?php echo base_url('assets/vendor/bootstrap-select/js/bootstrap-select.min.js'); ?>"></script>



                <script src="https://cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>

                <script>

                                                $('.date').datepicker({
                                                    language: 'it-IT',
                                                    multidate: true,
                                                    format: 'dd-mm-yyyy'
                                                });

<?php if (isset($date) && count($date) > 0) { ?>

                                                    $('#nextId').val('<?php echo $nextId; ?>');
                                                    editDate('<?php echo $date[0]->date; ?>',<?php echo $gruppo[0]; ?>);

<?php } else { ?>

                                                    $('#nextId').val("");
                                                    $('#dateCorso').val("");
                                                    $('#gruppo').val("");

<?php } ?>

//                                                $("#btnModalDate").click(function () {
//
//                                                    $('#nextId').val("");
//                                                    $('#dateCorso').val("");
//                                                    $('#gruppo').val("");
//                                                    $("#some_element").html("");
//                                                    $('#myModal').modal('show');
//                                                });
//
//                                                var edit = undefined;


                                                function editDate(myDate, gruppo)
                                                {

                                                    var idCorso = $('#idCorso').val();
                                                    var dates = myDate.split(',');
                                                    // alert(dates.toString());

                                                    $('.date').datepicker('setDate', dates);

//                                                    var comboGiorno = new Array();
                                                    var giorno = myDate;
//                                                    comboGiorno = giorno.split(',');

                                                    comboGiorno = dates;

                                                    $("#some_element").html("");

                                                    var i;
                                                    for (i = 0; i < comboGiorno.length; i++) {

                                                        var lunghezza = comboGiorno.length;
                                                        var whithColonna = (100 / lunghezza);
                                                        var gg = comboGiorno[i];

//                                                        if (document.getElementById("sortable-row-" + gg)) {
//
//                                                            alert('Attenzione questa data ' + gg + ' è già presente');
//
//                                                        } else {

                                                        var co = "<button style='margin-top:20px;' type='button' class='btn btn-default btn-sm' onclick='addMoreRows(\"" + gg + "\");'><i class='fas fa-plus-circle'></i></button>";

                                                        co += '<ul id="sortable-row-' + gg + '"></ul>';

                                                        var myEle = document.getElementById("myElement");
                                                        if (myEle) {
                                                            var myEleValue = myEle.value;
                                                        }

                                                        var orariCorso = '<div style="border-top:4px solid #f0ad4e;width:' + whithColonna + '%;float:left;" class="form-inline">';
                                                        orariCorso += '<input style="margin-top:20px;margin-left:10px;width:40%" name="giorno-' + comboGiorno[i] + '" type="text" class="form-control input-sm" value="' + comboGiorno[i] + '">';
                                                        orariCorso += '<button style="margin-top:20px;margin-left:10px;" type="button" class="btn btn-danger btn-sm" onclick="giornoDelete(\'' + comboGiorno[i] + '\', ' + gruppo + ' )" style="margin-left:10px;">';
                                                        orariCorso += '<span class="glyphicon glyphicon-trash" aria-hidden="true"  ></span>';
                                                        orariCorso += '</button> ' + co;

                                                        orariCorso += '</div>';

                                                        jQuery('#some_element').append(orariCorso);
//                                                        }
                                                    }

                                                    var addLi;

                                                    $.ajax({
                                                        url: "<?php echo site_url('corsi/getDateOrariByIdCorso/') ?>" + idCorso + '/' + gruppo,
                                                        type: "GET",
                                                        dataType: "JSON",
                                                        success: function (response)
                                                        {
                                                            $.each(response.data, function (k, v) {

                                                                $.each(v.oraricorso, function (z, x) {

                                                                    addLi = '<li id=' + x.idOrariCorso + ' class="ui-state-default" style="list-style-type:none;width:80%;margin-left:10px;">' +
                                                                            '<div style="width:100%;border:0px solid red; display: inline-block;vertical-align: top; margin-top: 15px;">' +
                                                                            '<div style="margin: 1px; border: 0px solid green;" class="form-inline">' +
                                                                            '<select name="orario" class="form-control input-sm"  style="width:60%" >' +
                                                                            '<option selected>' + x.ora + '</option>' +
                                                                            '<option>08:00</option>' +
                                                                            '<option>08:30</option>' +
                                                                            '<option>09:00</option>' +
                                                                            '<option>09:30</option>' +
                                                                            '<option>10:00</option>' +
                                                                            '<option>10:30</option>' +
                                                                            '<option>11:00</option>' +
                                                                            '<option>11:30</option>' +
                                                                            '<option>12:00</option>' +
                                                                            '<option>12:30</option>' +
                                                                            '<option>13:00</option>' +
                                                                            '<option>13:30</option>' +
                                                                            '<option>14:00</option>' +
                                                                            '<option>14:30</option>' +
                                                                            '<option>15:00</option>' +
                                                                            '<option>15:30</option>' +
                                                                            '<option>16:00</option>' +
                                                                            '<option>16:30</option>' +
                                                                            '<option>17:00</option>' +
                                                                            '<option>17:30</option>' +
                                                                            '<option>18:00</option>' +
                                                                            '<option>18:30</option>' +
                                                                            '<option>19:00</option>' +
                                                                            '<option>19:30</option>' +
                                                                            '<option>20:00</option>' +
                                                                            '<option>20:30</option>' +
                                                                            '<option>21:00</option>' +
                                                                            '<option>21:30</option>' +
                                                                            '</select>' +
                                                                            '<button type="button" class="btn btn-danger btn-sm" onclick="removeRowDb(' + x.idOrariCorso + ');" style="margin-left:10px;">' +
                                                                            '<span class="glyphicon glyphicon-trash" aria-hidden="true"  ></span>' +
                                                                            '</button> ' +
                                                                            '</div>' +
                                                                            '<div style="margin-left: 0px;">' +
                                                                            '<input style="margin-top:10px; width:60%" type="text"  name="ita" id="ita_' + x.idOrariCorso + '" value="' + x.titolo_ITA + '" class="form-control input-sm" placeholder="Italiano">' +
                                                                            '</div>' +
                                                                            '<div style="margin-left: 0px;">' +
                                                                            '<input style="margin-top:10px; width:60%" type="text"  name="eng" id="eng_' + x.idOrariCorso + '" value="' + x.titolo_ENG + '" class="form-control input-sm" placeholder="Inglese">' +
                                                                            '</div>' +
                                                                            '</div>' +
                                                                            '</li><hr style="margin-left:10px;border:1px solid #f0ad4e;width:45%;float:left; padding:0px;margin-top:10px; margin-bottom:0px;"></ul></div>';

                                                                    jQuery('#sortable-row-' + v.giorno).append(addLi);

                                                                });
                                                            });

                                                        },
                                                        error: function (jqXHR, textStatus, errorThrown)
                                                        {
                                                            alert('Error get data from ajax');
                                                        }
                                                    });

                                                    $('#dateCorso').val(myDate);
                                                    $('#gruppo').val(gruppo);

                                                    $('#myModal').modal('show'); // show bootstrap modal
                                                }


                                                function giornoDelete(giornotxt, gruppotxt)
                                                {
                                                    if (confirm('Attenzione stai cancellando un giorno, cancellerai tutti gli orari legati al medesimo giorno, sei sicuro? '))
                                                    {
                                                        // ajax delete data to database
                                                        $.ajax({
                                                            url: "<?php echo site_url('corsi/giornoDelete/') ?>",
                                                            type: "POST",
                                                            data: {
                                                                idCorso: $('#idCorso').val(),
                                                                giorno: giornotxt,
                                                                gruppo: gruppotxt
                                                            },
                                                            dataType: "JSON",
                                                            success: function (data)
                                                            {
                                                                setTimeout(function () {
                                                                    window.location.href = '<?php echo site_url('corsi/dateCorso/') ?>' + $('#idCorso').val() + '/' + gruppotxt;
                                                                }, 1000);

                                                            },
                                                            error: function (jqXHR, textStatus, errorThrown)
                                                            {
                                                                alert('Error deleting data');
                                                            }
                                                        });

                                                    }
                                                }



                                                var rowCount = 0;

                                                function addGiorni() {


                                                    rowCount++;
                                                    var comboGiorno = new Array();
                                                    var giorno = $('#dateCorso').val();
                                                    comboGiorno = giorno.split(',');

                                                    var i;
                                                    for (i = 0; i < comboGiorno.length; i++) {

                                                        var gg = comboGiorno[i];

                                                        if (document.getElementById("sortable-row-" + gg)) {



<?php if (isset($date) && count($date) > 0) { ?>

                                                                //alert('Attenzione questa data ' + gg + ' è già presente');
                                                                //alert('inviooooo');

                                                                var giorno = $('#dateCorso').val();

                                                                var url = "<?php echo site_url('corsi/updateDateNuoviGiorni') ?>";

                                                                $.ajax({
                                                                    url: url,
                                                                    type: "POST",
                                                                    data: {
                                                                        idCorso: $('#idCorso').val(),
                                                                        gruppo: $('#gruppo').val(),
                                                                        date: giorno
                                                                    },
                                                                    dataType: "json",
                                                                    success: function (result)
                                                                    {
                                                                        if (result.validation) //if success close modal and reload ajax table
                                                                        {
                                                                            setTimeout(function () {
                                                                                window.location.href = '<?php echo site_url('corsi/dateCorso/') ?>' + $('#idCorso').val() + '/' + $('#gruppo').val();
                                                                            }, 1000);
                                                                        } else {
                                                                            alert(result.message);
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
                                                                return false;
<?php } ?>

                                                        } else {

                                                            var lunghezza = comboGiorno.length;
                                                            var whithColonna = (100 / lunghezza);

                                                            var co = "<button type='button' class='btn btn-default btn-sm' onclick='addMoreRows(\"" + gg + "\");'><i class='fas fa-plus-circle'></i></button>";

                                                            co += '<ul id="sortable-row-' + gg + '"></ul>';

                                                            var myEle = document.getElementById("myElement");
                                                            if (myEle) {
                                                                var myEleValue = myEle.value;
                                                            }

                                                            var orariCorso = '<div style="width:' + whithColonna + '%;float:left;" class="form-inline" >';
                                                            orariCorso += '<input style="width:50%" name="giorno-' + comboGiorno[i] + '" type="text" class="form-control input-sm" value="' + comboGiorno[i] + '">';
                                                            orariCorso += '<button type="button" class="btn btn-danger btn-sm" onclick="giornoDelete(\'' + comboGiorno[i] + '\', ' + gruppo + ' )" style="margin-left:10px;">';
                                                            orariCorso += '<span class="glyphicon glyphicon-trash" aria-hidden="true"  ></span>';
                                                            orariCorso += '</button> ' + co;
                                                            orariCorso += '</div>';

                                                            jQuery('#some_element').append(orariCorso);

                                                        }

                                                    }
                                                }


                                                function save()
                                                {
                                                    if ($('#gruppo').val() !== '') {
                                                        saveUpdate();
                                                        return false;
                                                    }

                                                    $('#btnSave').text('saving...'); //change button text
                                                    $('#btnSave').attr('disabled', true); //set button disable 

                                                    var giorno = $('#dateCorso').val();
                                                    comboGiorno = giorno.split(',');

                                                    var selectedLanguage = new Array();

                                                    var i;
                                                    for (i = 0; i < comboGiorno.length; i++) {

                                                        var gg = comboGiorno[i];

                                                        $('ul#sortable-row-' + gg + ' li').each(function () {
                                                            selectedLanguage.push($(this).parent("ul").attr("id") + '|' + $(this).find('option:selected').text() + '|' + $(this).find("input[name^='ita']").val() + '|' + $(this).find("input[name^='eng']").val());
                                                        });

                                                    }

                                                    var url = "<?php echo site_url('corsi/addDate') ?>";

                                                    $.ajax({
                                                        url: url,
                                                        type: "POST",
                                                        data: {
                                                            idCorso: $('#idCorso').val(),
                                                            gruppo: $('#gruppo').val(),
                                                            date: selectedLanguage
                                                        },
                                                        dataType: "json",
                                                        success: function (result)
                                                        {

                                                            if (result.validation) //if success close modal and reload ajax table
                                                            {

//                                                                $('#modal_form').modal('hide');
//                                                                setTimeout(function () {
//                                                                    location.reload();
//                                                                }, 500);

                                                                setTimeout(function () {
                                                                    window.location.href = '<?php echo site_url('corsi/dateCorso/') ?>' + $('#idCorso').val() + '/' + result.gruppo;
                                                                }, 1000);





                                                            } else {
                                                                alert(result.message);
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



                                                function saveUpdate()
                                                {
                                                    $('#btnSave').text('saving...'); //change button text
                                                    $('#btnSave').attr('disabled', true); //set button disable 

                                                    var giorno = $('#dateCorso').val();
                                                    comboGiorno = giorno.split(',');

                                                    var selectedLanguage = new Array();

                                                    var i;
                                                    for (i = 0; i < comboGiorno.length; i++) {

                                                        var gg = comboGiorno[i];

                                                        $('ul#sortable-row-' + gg + ' li').each(function () {
                                                            selectedLanguage.push($(this).parent("ul").attr("id") + '|' + $(this).attr('id') + '|' + $(this).find('option:selected').text() + '|' + $(this).find("input[name^='ita']").val() + '|' + $(this).find("input[name^='eng']").val());
                                                        });
                                                    }

                                                    var url = "<?php echo site_url('corsi/updateDate') ?>";

                                                    console.log(selectedLanguage.toString());

                                                    $.ajax({
                                                        url: url,
                                                        type: "POST",
                                                        data: {
                                                            idCorso: $('#idCorso').val(),
                                                            gruppo: $('#gruppo').val(),
                                                            date: selectedLanguage
                                                        },
                                                        dataType: "json",
                                                        success: function (result)
                                                        {
                                                            if (result.validation) //if success close modal and reload ajax table
                                                            {
                                                                $('#modal_form').modal('hide');
                                                                setTimeout(function () {
                                                                    location.reload();
                                                                }, 500);
                                                            } else {
                                                                alert(result.message);
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


                                                function addMoreRows(giorno) {
                                                    rowCount++;
                                                    var greatId = Math.max.apply(null, $('ul li').each(function (i)
                                                    {
                                                        $(this).attr('id'); // This is your rel value
                                                    }));

                                                    if ($('#nextId').val() !== "") {
                                                        var newId = $('#nextId').val();
                                                    } else {
                                                        var greatId = Math.max.apply(null, $('ul li').map(function ()
                                                        {
                                                            return $(this).attr('id'); // This is your rel value
                                                        }));

                                                        var newId = parseInt(greatId) + 1;
                                                    }

                                                    var addLi = '<li id=' + newId + ' class="ui-state-default" style="list-style-type:none;width:80%;margin-left:10px;">' +
                                                            '<div style="width:100%;border:0px solid red; display: inline-block;vertical-align: top; margin-top: 15px;">' +
                                                            '<div style="margin: 1px; border: 0px solid green;" class="form-inline">' +
                                                            '<select name="orario" class="form-control input-sm" style="width:60%">' +
                                                            '<option>08:00</option>' +
                                                            '<option>08:30</option>' +
                                                            '<option>09:00</option>' +
                                                            '<option>09:30</option>' +
                                                            '<option>10:00</option>' +
                                                            '<option>10:30</option>' +
                                                            '<option>11:00</option>' +
                                                            '<option>11:30</option>' +
                                                            '<option>12:00</option>' +
                                                            '<option>12:30</option>' +
                                                            '<option>13:00</option>' +
                                                            '<option>13:30</option>' +
                                                            '<option>14:00</option>' +
                                                            '<option>14:30</option>' +
                                                            '<option>15:00</option>' +
                                                            '<option>15:30</option>' +
                                                            '<option>16:00</option>' +
                                                            '<option>16:30</option>' +
                                                            '<option>17:00</option>' +
                                                            '<option>17:30</option>' +
                                                            '<option>18:00</option>' +
                                                            '<option>18:30</option>' +
                                                            '<option>19:00</option>' +
                                                            '<option>19:30</option>' +
                                                            '<option>20:00</option>' +
                                                            '<option>20:30</option>' +
                                                            '<option>21:00</option>' +
                                                            '<option>21:30</option>' +
                                                            '</select>' +
                                                            '<button type="button" class="btn btn-danger btn-sm" onclick="removeRow(' + newId + ');" style="margin-left:10px;">' +
                                                            '<span class="glyphicon glyphicon-trash" aria-hidden="true"  ></span>' +
                                                            '</button> ' +
                                                            '</div>' +
                                                            '<div style="margin-left: 0px;">' +
                                                            '<input style="margin-top:10px; width:60%"  type="text"  name="ita" id="ita_' + newId + '" class="form-control input-sm" placeholder="Italiano">' +
                                                            '</div>' +
                                                            '<div style="margin-left: 0px;">' +
                                                            '<input style="margin-top:10px; width:60%"  type="text"  name="eng" id="eng_' + newId + '" class="form-control input-sm" placeholder="Inglese">' +
                                                            '</div>' +
                                                            '</div>' +
                                                            '</li></ul></div>';


                                                    jQuery('#sortable-row-' + giorno).append(addLi);
                                                    $('#nextId').val('');
                                                }


                                                function removeRow(id) {
                                                    if (confirm('Sei sicuro di voler cancellare questo orario?'))
                                                        $('#' + id).remove();

                                                }


                                                function removeRowDb(removeNum) {

                                                    //alert(removeNum);     
                                                    if (confirm('Sei sicuro di voler cancellare questo orario?'))
                                                    {

                                                        $('#' + removeNum).remove();

                                                        // ajax delete data to database
                                                        $.ajax({
                                                            url: "<?php echo site_url('corsi/orarioDelete/') ?>/" + removeNum,
                                                            type: "POST",
                                                            dataType: "JSON",
                                                            success: function (data)
                                                            {

                                                            },
                                                            error: function (jqXHR, textStatus, errorThrown)
                                                            {
                                                                alert('Error deleting data');
                                                            }
                                                        });

                                                    }

                                                }

                </script>
                <script src="<?php echo base_url('assets/vendor/bootstrap-toggle/js/bootstrap-toggle.min.js'); ?>"></script>

                </body>
                </html>
