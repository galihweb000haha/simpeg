<?php
session_start();
if ($_SESSION == NULL) {
    header('location:login.php');
} else {
    include "fungsi/koneksi.php";
    include"fungsi/fungsi_tanggal.php";
    include"fungsi/fungsi_library.php";
    include"fungsi/format_number.php";
?>

    <!doctype html>
    <!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
    <!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
    <!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
        <head>
        <?php include"header.php"; ?>
    </script>
</head>
<body>
    <div id="wrapper">
        <div id="header" style="color:white;font-size:24px;padding-top:5px;">
            Sistem Informasi Penggajian <br/>
			PT. Super Honda Slawi        
	</div> <!-- #header -->
        <div id="content">

            <div id="contentHeader">
                <?php include"menu.php"; ?>
            </div> <!-- #contentHeader -->

            <div class="container">
                <?php include "konten.php"; ?>
            </div> <!-- .container -->

        </div> <!-- #content -->
        <div id="topNav">
            <span style="color:white;">
                Selamat Bekerja, <?php echo $_SESSION['nama'];?><br/>
                <a href="logout.php">Logout</a>
            </span>
        </div>

    </div> <!-- #wrapper -->

    <div id="footer">
        <?php include"footer.php"; ?>
            </div>

            <script>
                $(function () {

                    $('.formatCurrency').blur(function() {
                        $('.formatCurrency').html(null);
                        $(this).formatCurrency({colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 2});
                    })

                    .keyup(function(e) {
                        var e = window.event || e;
                        var keyUnicode = e.charCode || e.keyCode;
                        if (e !== undefined) {
                            switch (keyUnicode) {
                                case 16:break; // Shift
                                case 17:break; // Ctrl
                                case 18:break; // Alt
                                case 27:this.value = '';break; // Esc: clear entry
                                case 35:break; // End
                                case 36:break; // Home
                                case 37:break; // cursor left
                                case 38:break; // cursor up
                                case 39:break; // cursor right
                                case 40:break; // cursor down
                                case 78:break; // N (Opera 9.63+ maps the "." from the number key section to the "N" key too!) (See: http://unixpapa.com/js/key.html search for ". Del")
                                case 110:break; // . number block (Opera 9.63+ maps the "." from the number block to the "N" key (78) !!!)
                                case 190:break; // .
                                default:$(this).formatCurrency({colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true});
                            }
                        }
                    });

                    $( "#datepicker" ).datepicker();
                    $( "#datepicker_inline" ).datepicker();
                    $('#colorpickerHolder').ColorPicker({flat: true});
                    $('#timepicker').timepicker ({
                        showPeriod: true
                        , showNowButton: true
                        , showCloseButton: true
                    });

                    $('#timepicker_inline_div').timepicker({
                        defaultTime: '9:20'
                    });

                    $('#colorSelector').ColorPicker({
                        color: '#FF9900',
                        onShow: function (colpkr) {
                            $(colpkr).fadeIn(500);
                            return false;
                        },
                        onHide: function (colpkr) {
                            $(colpkr).fadeOut(500);
                            return false;
                        },
                        onSubmit: function (hsb, hex, rgb, el) {
                            $(el).ColorPickerHide ();
                        },
                        onChange: function (hsb, hex, rgb) {
                            $('#colorSelector div').css({ 'background-color': '#' + hex });
                            $('#colorpickerField1').val ('#' + hex);
                        }
                    });

                    //MODAL KARYAWAN        
                    $('#mdl_karyawan').live ('click', function (e) {
                        var nip = $(this).val();
                        e.preventDefault ();

                        $.modal ({
                            title: 'Data Karyawan'
                            , ajax: 'modul/mod_karyawan/karyawan_detail.php?nip='+nip
                        });
                    });

                    $('#colorpickerField1').live ('keyup', function (e) {
                        var val = $(this).val ();
                        val = val.replace ('#', '');
                        $('#colorSelector div').css({ 'background-color': '#' + val });
                        $('#colorSelector').ColorPickerSetColor(val);
                    });
                    
                    $("#id_jenis_tunjangan").change(function(){
                        var id_jenis_tunjangan = $(this).val(); 
                        //var item = $(this).parent(); //parent().paren... until you reach the element that you want to delete 
    						
                        if(id_jenis_tunjangan == "1"){
                            $("#banyak").show();
                            $("#per_anak").show();
                        }else{
                            $("#banyak").hide();
                            $("#per_anak").hide();
                        }
                    });
                    /*
                    $("#banyak").keyup(function(){
                        var banyak = $(this).val();
                        var per_anak = $("#per_anak").val(); 
                        var besar = 0;
                        
                        besar = banyak*per_anak;
                        
                        $("#besar_tunjangan").val(besar);
                    });
                    */
                    
                    $("#per_anaknya").keyup(function(){
                        var per_anak = $(this).val(); 
                        var banyak = $("#banyaknya").val();
                        var hasil_per_anak = 0;
                        var besar = 0;
                        
                        //alert('abc123def456ghi'.replace(/[^0-9]/g,''));
                        hasil_per_anak = per_anak.replace(/[^0-9]/g,'');
                        //var item = $(this).parent(); //parent().paren... until you reach the element that you want to delete 
    			besar = banyak*hasil_per_anak;
                        
                        $("#besar_tunjangan").val(besar);
                    });

                });

            </script>
        </body>
        </html>
<?php } ?>