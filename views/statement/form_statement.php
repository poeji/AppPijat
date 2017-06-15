<style type="text/css">
    .form-check{
                display:inline-block; 
                position:relative; 
                width:17px; 
                height:17px;
                }

    input.untukInput1 {
                      border-bottom: 2px solid ;
                      border-left:none;
                      border-right:none;
                      border-top:none;
                      outline: none;
                  }
    label.hitam{
                 color: #000;
                }
    label {
        color: rgb(107, 52, 106);
    }
</style>

<script type="text/javascript">
          function grand_total()
            {
                
                var harga = parseFloat(document.getElementById("i_harga").value);
                var qty = parseFloat(document.getElementById("i_qty").value);
                
                    
                var total = harga * qty;
                
                
                
                document.getElementById("i_total").value = total;
                
            }

           </script>
<!-- Content Header (Page header) -->
        

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          <!-- <div class="title_page"> <?= $title ?></div> -->
                             <form action="<?= $action_statement?>" method="post" enctype="multipart/form-data" role="form">
                             <?php
                             if(isset($_GET['member'])) {
                             ?>
                             <input type="hidden" name="i_member_id" value="<?=$_GET['member']?>">
                             <?php } ?>
                             <?php
                             if(isset($_GET['id'])) {
                             ?>
                             <input type="hidden" name="id" value="<?=$_GET['id']?>">
                             <?php } ?>
                                    <div class="box box-cokelat">
                                    
                                   
                                        <div class="box-body" style="background-color: #fff;">
                                        
                                        
                                            <div class="col-md-12"  style="background-color: #fff;">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                         <div>
                                                            <input class="untukInput1" type="text" size="105" placeholder="Nama " name="$i_name" value="<?= $r_member->member_name ?>" />
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="105" placeholder="Email" name="$i_email" value="<?= $r_member->member_email ?>" />
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="105" placeholder="Phone" name="$i_phone" value="<?= $r_member->member_phone ?>" />
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="105" placeholder="Alamat" name="$i_alamat" value="<?= $r_member->member_alamat ?>" />
                                                        </div><br>

                                                    </div>

                                                    <div class="form-group">
                                                        <div id="tekanan">
                                                             <label>Apakah anda mempunyai atau pernah mempunyai masalah tekanan darah tinggi ?</label>
                                                            <input type="checkbox" value="1" id="tekanan_on" name="i_tekanan" class="form-check" 
                                                            <?php if ($r_statement['tekanan']==1){echo "Checked";}?>
                                                            style="margin-left: 21%" /> <label class="hitam">Ya</label>
                                                            <input type="checkbox" value="2" id="tekanan_off" name="i_tekanan" 
                                                            <?php if ($r_statement['tekanan']==2){echo "Checked";}?>
                                                            class="form-check" style="margin-left: 4%;"> <label class="hitam">Tidak</label>    
                                                        </div>
                                                        <div id="asma">
                                                            <label>Apakah anda menderita asma?</label> 
                                                            <input type="checkbox" value="1" id="asma_on" name="i_asma" class="form-check"  
                                                            <?php if ($r_statement['asma']==1){echo "Checked";}?>
                                                            style="margin-left: 56.5%" /> <label class="hitam">Ya</label>
                                                            <input type="checkbox" value="2" id="asma_off" name="i_asma" class="form-check"
                                                            <?php if ($r_statement['asma']==2){echo "Checked";}?>
                                                            style="margin-left: 4%;"/> <label class="hitam">Tidak</label>
                                                        </div>
                                                        <div id="inhaler">
                                                            <label>Jika ya, apakah anda perlu menggunakan inhaler saat perawatan berlangsung?</label>
                                                            <input type="checkbox" value="1" id="inhaler_on" name="i_inhaler" class="form-check" 
                                                            <?php if ($r_statement['inhaler']==1){echo "Checked";}?>
                                                             style="margin-left: 22.8%" /> <label class="hitam">Ya</label>
                                                            <input type="checkbox" value="2" id="inhaler_off" name="i_inhaler" class="form-check" 
                                                            <?php if ($r_statement['inhaler']==2){echo "Checked";}?>
                                                            style="margin-left: 4%;" /> <label class="hitam">Tidak</label>
                                                        </div>
                                                        <div id="leher">
                                                            <label>Apakah anda sedang mengalami masalah leher dan punggung?</label>
                                                            <input type="checkbox" value="1" id="leher_on" name="i_leher" class="form-check" 
                                                            <?php if ($r_statement['leher']==1){echo "Checked";}?>
                                                            style="margin-left: 33.6%" /> <label class="hitam">Ya</label>
                                                            <input type="checkbox" value="2" id="leher_off" name="i_leher" class="form-check" 
                                                            <?php if ($r_statement['leher']==2){echo "Checked";}?>
                                                            style="margin-left: 4.1%;" /> <label class="hitam">Tidak</label>
                                                        </div>
                                                        <div id="kulit"> 
                                                            <label>Apakah anda sedang memiliki masalah kulit, luka, cedera, atau infeksi?</label>
                                                            <input type="checkbox" value="1" id="kulit_on" name="i_kulit" class="form-check" 
                                                            <?php if ($r_statement['kulit']==1){echo "Checked";}?>
                                                            style="margin-left: 28.5%" /> <label class="hitam">Ya</label>
                                                            <input type="checkbox" value="2" id="kulit_off" name="i_kulit" class="form-check" 
                                                            <?php if ($r_statement['kulit']==2){echo "Checked";}?>
                                                            style="margin-left: 4%;"/> <label class="hitam">Tidak</label>
                                                        </div>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="105" placeholder="Jika ya, Tolong Jabarkan" name="i_kulit_jabarkan" value="<?=$r_statement['kulit_jabarkan']?>" />
                                                        </div>
                                                        <!-- <br> -->
                                                        <div id="selain" >
                                                            <label>Apakah anda memiliki masalah kesehatan selain yang telah disebutkan di atas dan perlu terapis anda ketahui?</label>
                                                            <input type="checkbox" value="1" id="selain_on" name="i_selain" class="form-check"  
                                                            <?php if ($r_statement['leher']==1){echo "Checked";}?>
                                                            style="margin-left: 0.9%" /> <label class="hitam">Ya</label>
                                                            <input type="checkbox" value="2" id="selain_off" name="i_selain" class="form-check" 
                                                            <?php if ($r_statement['leher']==2){echo "Checked";}?>
                                                            style="margin-left: 4%;" /> <label class="hitam">Tidak</label>
                                                        </div>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="105" placeholder="Jika ya, Tolong Jabarkan" name="i_selain_jabarkan" value="<?= $r_statement['selain_jabarkan']?>" />
                                                        </div>
                                                        <!-- <br> -->
                                                        <div id="alergi">
                                                            <label>Apakah anda memiliki alergi atau bahan-bahan tertentu yang dapat bereaksi terhadap kulit anda?</label>
                                                            <input type="checkbox" value="1" id="alergi_on" name="i_alergi" class="form-check" 
                                                             <?php if ($r_statement['alergi']==1){echo "Checked";}?>
                                                            style="margin-left: 10.1%" /> <label class="hitam">Ya</label>
                                                            <input type="checkbox" value="2" id="alergi_off" name="i_alergi" class="form-check" 
                                                            <?php if ($r_statement['alergi']==2){echo "Checked";}?>
                                                            style="margin-left: 4%;" /> <label class="hitam">Tidak</label>
                                                        </div>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="105" placeholder="Jika ya, Tolong Jabarkan" name="i_alergi_jabarkan" value="<?= $r_statement['alergi_jabarkan']?>" />
                                                        </div>
                                                        <!-- <br> -->
                                                        <div id="hamil">
                                                            <label>Apakah anda sedang hamil atau sedang merencanakan kehamilan?</label>
                                                            <input type="checkbox" value="1" id="hamil_on" name="i_hamil" class="form-check" 
                                                            <?php if ($r_statement['hamil']==1){echo "Checked";}?>
                                                            style="margin-left: 31%" /> <label class="hitam">Ya</label>
                                                            <input type="checkbox" value="2" id="hamil_off" name="i_hamil" class="form-check" 
                                                            <?php if ($r_statement['hamil']==2){echo "Checked";}?>
                                                            style="margin-left: 4%;"/> <label class="hitam">Tidak</label>
                                                        </div>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="105" placeholder="Jika ya, Berapa usia kandungan anda ?" name="i_usia_kandungan" value="<?= $r_statement['usia_kandungan']?>" />
                                                        </div>
                                                        <!-- <br> -->
                                                        <div  id="lens">
                                                            <label>Apakah anda menggunakan kontak lens?</label>
                                                            <input type="checkbox" value="1" id="lens_on" name="i_lens" class="form-check" 
                                                            <?php if ($r_statement['kontak_lens']==1){echo "Checked";}?>
                                                            style="margin-left: 48.9%" /> <label class="hitam">Ya</label>
                                                            <input type="checkbox" value="2" id="lens_off" name="i_lens" class="form-check" 
                                                            <?php if ($r_statement['kontak_lens']==2){echo "Checked";}?>
                                                            style="margin-left: 4%;"/> <label class="hitam">Tidak</label>
                                                        </div>
                                                        <div id="melepasnya">
                                                            <label>Jika ya, apakah anda perlu melepasnya sebelum perawatan wajah atau perawatan lainnya?</label>
                                                            <input type="checkbox" value="1" id="melepasnya_on" name="i_melepasnya" class="form-check" 
                                                            <?php if ($r_statement['melepas_lens']==1){echo "Checked";}?>
                                                            style="margin-left: 14.7%" /> <label class="hitam">Ya</label>
                                                            <input type="checkbox" value="2" id="melepasnya_off" name="i_melepasnya" class="form-check" 
                                                            <?php if ($r_statement['melepas_lens']==2){echo "Checked";}?>
                                                            style="margin-left: 4%;" /> <label class="hitam">Tidak</label>
                                                        </div>
                                                        <div>
                                                            <label>Bagaimana level tekanan pijatan yang anda inginkan saat perawatan?</label>
                                                            <input type="checkbox" value="1" id="pijatan_1" name="i_level" class="form-check check_2" 
                                                            <?php if ($r_statement['level']==1){echo "Checked";}?> style="margin-left: 29.2%;"
                                                             /> <label class="hitam">Lembut</label>
                                                            <input type="checkbox" value="2" id="pijatan_2" name="i_level" class="form-check check_2" 
                                                            <?php if ($r_statement['level']==2){echo "Checked";}?>
                                                            style="margin-left: 0.4%;" /> <label class="hitam">Sedang</label>
                                                            <input type="checkbox" value="3" id="pijatan_3" name="i_level" class="form-check check_2" 
                                                            <?php if ($r_statement['level']==3){echo "Checked";}?>
                                                            style="margin-left: 0.4%" /> <label class="hitam">Kuat</label>
                                                        </div>
                                                            <div  id="spesial">
                                                                <label>Apakah anda ingin mendapatkan penawaran spesial kami melalui email atau pesan SMS/WA?</label>
                                                                <input type="checkbox" value="1" id="spesial_on" name="i_spesial" class="form-check" 
                                                                <?php if ($r_statement['spesial']==1){echo "Checked";}?>
                                                                style="margin-left: 13.2%" /> <label class="hitam">Ya</label>
                                                                <input type="checkbox" value="2" id="spesial_off" name="i_spesial" class="form-check" 
                                                                <?php if ($r_statement['spesial']==2){echo "Checked";}?>
                                                                style="margin-left: 4.1%;"/> <label class="hitam">Tidak</label>
                                                            </div>
                                                        <div id="jawaban">
                                                            <label>Saya menyatakan bahwa jawaban yang berikan adalah benar</label>
                                                            <input type="checkbox" value="1" id="jawaban_on" name="i_jawaban" class="form-check" 
                                                            <?php if ($r_statement['jawaban']==1){echo "Checked";}?>
                                                            style="margin-left: 35.6%" /> <label class="hitam">Ya</label>
                                                            <input type="checkbox" value="2" id="jawaban_off" name="i_jawaban" class="form-check" 
                                                            <?php if ($r_statement['jawaban']==2){echo "Checked";}?>
                                                            style="margin-left: 4%;"/> <label class="hitam">Tidak</label>
                                                        </div>
                                                        <div id="menyembunyikan" >
                                                            <label>Saya tidak menyembunyikan informasi apapun yang mungkin relevan untuk menentukan bagaimana
                                                            <br>perawatan saya dilakukan</label>
                                                            <input type="checkbox" value="1" id="menyembunyikan_on" name="i_menyembunyikan" class="form-check" 
                                                            <?php if ($r_statement['tidak_menyembunyikan']==1){echo "Checked";}?>
                                                            style="margin-left: 7.6%" /> <label class="hitam">Ya</label>
                                                            <input type="checkbox" value="2" id="menyembunyikan_off" name="i_menyembunyikan" class="form-check" 
                                                            <?php if ($r_statement['tidak_menyembunyikan']==2){echo "Checked";}?>
                                                            style="margin-left: 4%;"/> <label class="hitam">Tidak</label>
                                                        </div>
                                                        <div id="bertanggung">
                                                            <label>Saya mengetahui bahwa Zee Holistic Living tidak bertanggung jawab atas cedera atau kerusakan
                                                            <br>setelah perawatan dilakukan</label>
                                                            <input type="checkbox" value="1" id="bertanggung_on" name="i_bertanggung_jawab" class="form-check" 
                                                            <?php if ($r_statement['tanggung_jawab']==1){echo "Checked";}?>
                                                            style="margin-left: 9.8%" /> <label class="hitam">Ya</label>
                                                            <input type="checkbox" value="2" id="bertanggung_off" name="i_bertanggung_jawab" class="form-check" 
                                                            <?php if ($r_statement['tanggung_jawab']==2){echo "Checked";}?>
                                                            style="margin-left: 4.1%;"/> <label class="hitam">Tidak</label>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                                
                                            <div style="clear:both;"></div>
                                         
                                        </div><!-- /.box-body -->
                                
                                            <div class="box-footer"  style="background-color: #fff;">
                                                <input class="btn btn-danger" type="submit" value="Save"/>
                                                <a href="<?= $close_button?>" class="btn btn-default" >Close</a>
                                            </div>
                            
                                    </div><!-- /.box -->
                            </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->

<script type="text/javascript">
    $(document).ready(function(){
        $('.form-check').click(function(){
            var elem_check_id = $(this).attr('id');
            // if ($('#'+elem_check_id).prop('checked', true)) {
                var elem = elem_check_id.split("_");
                if (elem[1] == "on") {
                    var elem_uncheck = '#'+elem[0]+'_off';
                } else {
                    var elem_uncheck = '#'+elem[0]+'_on';
                }
                $(elem_uncheck).prop('checked', false);
            // }
        });
    });

    $(document).ready(function(){
        $('.check_2').click(function(){
            var pijatan_check_id = $(this).attr('id');
                var pijatan = pijatan_check_id.split("_");
                // console.log(pijatan[0]);
                if (pijatan[1] == "1") {
                    var pijatan_uncheck_2 = '#'+pijatan[0]+'_2';
                    var pijatan_uncheck_3 = '#'+pijatan[0]+'_3';
                    $(pijatan_uncheck_2).prop('checked', false);
                    $(pijatan_uncheck_3).prop('checked', false);
                } else if (pijatan[1] == "2") {
                    var pijatan_uncheck_1 = '#'+pijatan[0]+'_1';
                    var pijatan_uncheck_3 = '#'+pijatan[0]+'_3';
                    $(pijatan_uncheck_1).prop('checked', false);
                    $(pijatan_uncheck_3).prop('checked', false);
                } else {
                    var pijatan_uncheck_1 = '#'+pijatan[0]+'_1';
                    var pijatan_uncheck_2 = '#'+pijatan[0]+'_2';
                    $(pijatan_uncheck_1).prop('checked', false);
                    $(pijatan_uncheck_2).prop('checked', false);
                }
                
        });
    });
</script>

