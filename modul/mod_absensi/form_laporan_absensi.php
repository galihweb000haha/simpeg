<?php
$aksi = "modul/mod_absensi/laporan_absensi.php";
?>
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Laporan Absensi</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="modul/mod_absensi/laporan_absensi.php" class="form uniformForm validateForm">

        <div class="field-group">
            <div class="field">
                <label for="expirationmonth">Bulan</label>
                <select id="bulan" name="bulan">
                    <option value="01">01 - Januari</option>
                    <option value="02">02 - Februari</option>
                    <option value="03">03 - Maret</option>
                    <option value="04">04 - April</option>
                    <option value="05">05 - Mei</option>
                    <option value="06">06 - Juni</option>
                    <option value="07">07 - Juli</option>
                    <option value="08">08 - Agustus</option>
                    <option value="09">09 - September</option>
                    <option value="10">10 - Oktober</option>
                    <option value="11">11 - November</option>
                    <option value="12">12 - Desember</option>			
                </select>
            </div>

            <div class="field">
                <label for="expirationyear">Tahun</label>
                <select id="tahun" name="tahun">
                  <?php for ( $i = 2000; $i <= 2050; $i ++) { ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php }?>
                </select>
            </div>
        </div>	

        <div class="actions">
            <button type="submit" class="btn btn-primary">Cetak</button>
            <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
        </div> <!-- .actions -->
    </form>
</div> <!-- .widget-content -->
<script>
    $(function () {
        $( "#bulan" ).datepicker({
            dateFormat : 'mm/yy'
        });
    });
</script>



