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
    .btn-danger1{
        background-color: #d82827;
        color: #fff;
    }
    label {
        color: rgb(107, 52, 106);
    }
    b{
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

                                    <div class="box box-cokelat">
                                    
                                   
                                        <div class="box-body" style="background-color: #fff;">
                                        
                                        
                                            <div class="col-md-12"  style="background-color: #fff;">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                         <div>
                                                            <input class="untukInput1" type="text" size="100" placeholder="Nama " name="$i_name" value="<?= $row->member_name ?>" />
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="100" placeholder="Email" name="$i_email" value="<?= $row->member_email ?>" />
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="100" placeholder="Phone" name="$i_phone" value="<?= $row->member_phone ?>" />
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="100" placeholder="Alamat" name="$i_alamat" value="<?= $row->member_alamat ?>" />
                                                        </div><br>
                                                    </div>

                                                    <div class="form-group" style="color: #000;">
                                                        <div>
                                                            <label>Apakah anda mempunyai atau pernah mempunyai masalah tekanan darah tinggi ?</label>
                                                        </div>
                                                        <div>
                                                            <label>Apakah anda menderita asma?</label> 
                                                        </div>
                                                        <div>
                                                            <label>Jika ya, apakah anda perlu menggunakan inhaler saat perawatan berlangsung?</label>
                                                        </div>
                                                         <div>
                                                            <label>Apakah anda sedang mengalami masalah leher dan punggung?</label>
                                                        </div>
                                                         <div>
                                                            <label>Apakah anda sedang memiliki masalah kulit, luka, cedera, atau infeksi?</label>
                                                        </div>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="100" placeholder="Jika ya, Tolong Jabarkan" name="i_kulit_jabarkan" value="<?=$r_statement->kulit_jabarkan?>" />
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <label>Apakah anda memiliki masalah kesehatan selain yang telah disebutkan di atas dan perlu terapis anda ketahui?</label>
                                                        </div>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="100" placeholder="Jika ya, Tolong Jabarkan" name="i_selain_jabarkan" value="<?= $r_statement->selain_jabarkan?>" />
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <label>Apakah anda memiliki alergi atau bahan-bahan tertentu yang dapat bereaksi terhadap kulit anda?</label>
                                                        </div>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="100" placeholder="Jika ya, Tolong Jabarkan" name="i_alergi_jabarkan" value="<?= $r_statement->alergi_jabarkan?>" />
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <label>Apakah anda sedang hamil atau sedang merencanakan kehamilan?</label>
                                                        </div>
                                                        <div>
                                                            <input class="untukInput1" type="text" size="100" placeholder="Jika ya, Berapa usia kandungan anda ?" name="i_usia_kandungan" value="<?= $r_statement->usia_kandungan?>" />
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <label>Apakah anda menggunakan kontak lens?</label>
                                                        </div>
                                                        <div>
                                                            <label>Jika ya, apakah anda perlu melepasnya sebelum perawatan wajah atau perawatan lainnya?</label>
                                                        </div>
                                                        <div>
                                                            <label>Bagaimana level tekanan pijatan yang anda inginkan saat perawatan?</label>
                                                        </div>
                                                        <div>
                                                            <label>Apakah anda ingin mendapatkan penawaran spesial kami melalui email atau pesan SMS/WA?</label>
                                                        </div>
                                                        <div>
                                                            <label>Saya menyatakan bahwa jawaban yang berikan adalah benar</label>
                                                        </div>
                                                         <div id="menyembunyikan">
                                                            <label>Saya tidak menyembunyikan informasi apapun yang mungkin relevan untuk menentukan bagaimana perawatan saya dilakukan</label>
                                                        </div>
                                                        <div id="menyembunyikan">
                                                            <label>Saya mengetahui bahwa Zee Holistic Living tidak bertanggung jawab atas cedera atau keruskan setelah perawatan dilakukan</label>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    <div style="margin-bottom: 70%;">
                                                        <center><img src=".."></center>
                                                    </div>
                                                    <div id="tekanan">
                                                        <input type="checkbox" value="1" id="tekanan_on" name="i_tekanan" class="form-check" 
                                                        <?php if ($r_statement->tekanan==1){echo "Checked";}?>
                                                        style="margin-left: 5%" /> <b>Ya
                                                        <input type="checkbox" value="2" id="tekanan_off" name="i_tekanan" 
                                                        <?php if ($r_statement->tekanan==2){echo "Checked";}?>
                                                        class="form-check" style="margin-left: 17%;"> Tidak    
                                                    </div>   
                                                    <div id="asma">
                                                        <input type="checkbox" value="1" id="asma_on" name="i_asma" class="form-check"  
                                                        <?php if ($r_statement->asma==1){echo "Checked";}?>
                                                        style="margin-left: 5%" /> <b>Ya
                                                        <input type="checkbox" value="2" id="asma_off" name="i_asma" class="form-check"
                                                        <?php if ($r_statement->asma==2){echo "Checked";}?>
                                                        style="margin-left: 17%;"/> Tidak
                                                    </div>
                                                    <div id="inhaler">
                                                        <input type="checkbox" value="1" id="inhaler_on" name="i_inhaler" class="form-check" 
                                                        <?php if ($r_statement->inhaler==1){echo "Checked";}?>
                                                         style="margin-left: 5%" /> <b>Ya
                                                        <input type="checkbox" value="2" id="inhaler_off" name="i_inhaler" class="form-check" 
                                                        <?php if ($r_statement->inhaler==2){echo "Checked";}?>
                                                        style="margin-left: 17%;" /> Tidak
                                                    </div>
                                                    <div id="leher">
                                                        <input type="checkbox" value="1" id="leher_on" name="i_leher" class="form-check" 
                                                        <?php if ($r_statement->leher==1){echo "Checked";}?>
                                                        style="margin-left: 5%" /> <b>Ya
                                                        <input type="checkbox" value="2" id="leher_off" name="i_leher" class="form-check" 
                                                        <?php if ($r_statement->leher==2){echo "Checked";}?>
                                                        style="margin-left: 17%;" /> Tidak
                                                    </div>

                                                    <div id="kulit" style="margin-bottom: 16%;"> 
                                                        <input type="checkbox" value="1" id="kulit_on" name="i_kulit" class="form-check" 
                                                        <?php if ($r_statement->kulit==1){echo "Checked";}?>
                                                        style="margin-left: 5%" /> <b>Ya
                                                        <input type="checkbox" value="2" id="kulit_off" name="i_kulit" class="form-check" 
                                                        <?php if ($r_statement->kulit==2){echo "Checked";}?>
                                                        style="margin-left: 17%;"/> Tidak
                                                    </div>
                                                    <div id="selain" style="margin-bottom: 16%;">
                                                        <input type="checkbox" value="1" id="selain_on" name="i_selain" class="form-check"  
                                                        <?php if ($r_statement->selain_diatas==1){echo "Checked";}?>
                                                        style="margin-left: 5%; margin-top: 4%;" /> <b>Ya
                                                        <input type="checkbox" value="2" id="selain_off" name="i_selain" class="form-check" 
                                                        <?php if ($r_statement->selain_diatas==2){echo "Checked";}?>
                                                        style="margin-left: 17%;" /> Tidak
                                                    </div>
                                                    <div id="alergi" style="margin-bottom: 5%;">
                                                        <input type="checkbox" value="1" id="alergi_on" name="i_alergi" class="form-check" 
                                                         <?php if ($r_statement->alergi==1){echo "Checked";}?>
                                                        style="margin-left: 5%; margin-top: 15%"; /> <b>Ya
                                                        <input type="checkbox" value="2" id="alergi_off" name="i_alergi" class="form-check" 
                                                        <?php if ($r_statement->alergi==2){echo "Checked";}?>
                                                        style="margin-left: 17%;" /> Tidak
                                                    </div>
                                                    <div id="hamil" style="margin-bottom: 14%;">
                                                        <input type="checkbox" value="1" id="hamil_on" name="i_hamil" class="form-check" 
                                                        <?php if ($r_statement->hamil==1){echo "Checked";}?>
                                                        style="margin-left: 5%; margin-top: 15%"; /> <b>Ya
                                                        <input type="checkbox" value="2" id="hamil_off" name="i_hamil" class="form-check" 
                                                        <?php if ($r_statement->hamil==2){echo "Checked";}?>
                                                        style="margin-left: 17%;"/> Tidak
                                                    </div>
                                                    <div  id="lens">
                                                        <input type="checkbox" value="1" id="lens_on" name="i_lens" class="form-check" 
                                                        <?php if ($r_statement->kontak_lens==1){echo "Checked";}?>
                                                        style="margin-left: 5%; margin-top: 8%;" /> <b>Ya
                                                        <input type="checkbox" value="2" id="lens_off" name="i_lens" class="form-check" 
                                                        <?php if ($r_statement->kontak_lens==2){echo "Checked";}?>
                                                        style="margin-left: 17%;"/> Tidak
                                                    </div>
                                                    <div id="melepasnya">
                                                        <input type="checkbox" value="1" id="melepasnya_on" name="i_melepasnya" class="form-check" 
                                                        <?php if ($r_statement->melepas_lens==1){echo "Checked";}?>
                                                        style="margin-left: 5%" /> <b>Ya
                                                        <input type="checkbox" value="2" id="melepasnya_off" name="i_melepasnya" class="form-check" 
                                                        <?php if ($r_statement->melepas_lens==2){echo "Checked";}?>
                                                        style="margin-left: 17%;" /> Tidak
                                                    </div>
                                                    <div>
                                                        <input type="checkbox" value="1" id="pijatan_1" name="i_level" class="form-check check_2" 
                                                        <?php if ($r_statement->level==1){echo "Checked";}?>
                                                         style="margin-left: 5%;" /> Lembut 
                                                        <input type="checkbox" value="2" id="pijatan_2" name="i_level" class="form-check check_2" 
                                                        <?php if ($r_statement->level==2){echo "Checked";}?>
                                                        style="margin-left: 1%;" /> Sedang
                                                        <input type="checkbox" value="3" id="pijatan_3" name="i_level" class="form-check check_2" 
                                                        <?php if ($r_statement->level==3){echo "Checked";}?>
                                                        style="margin-left: 1%" /> Kuat
                                                    </div>
                                                    <div  id="spesial">
                                                        <input type="checkbox" value="1" id="spesial_on" name="i_spesial" class="form-check" 
                                                        <?php if ($r_statement->spesial==1){echo "Checked";}?>
                                                        style="margin-left: 5%;" /> <b>Ya
                                                        <input type="checkbox" value="2" id="spesial_off" name="i_spesial" class="form-check" 
                                                        <?php if ($r_statement->spesial==2){echo "Checked";}?>
                                                        style="margin-left: 17%;"/> Tidak
                                                    </div>
                                                    <div id="jawaban">
                                                        <input type="checkbox" value="1" id="jawaban_on" name="i_jawaban" class="form-check" 
                                                        <?php if ($r_statement->jawaban==1){echo "Checked";}?>
                                                        style="margin-left: 5%" /> <b>Ya
                                                        <input type="checkbox" value="2" id="jawaban_off" name="i_jawaban" class="form-check" 
                                                        <?php if ($r_statement->jawaban==2){echo "Checked";}?>
                                                        style="margin-left: 17%;"/> Tidak
                                                    </div>
                                                    <div id="menyembunyikan" style="margin-bottom: 5%;">
                                                        <input type="checkbox" value="1" id="menyembunyikan_on" name="i_menyembunyikan" class="form-check" 
                                                        <?php if ($r_statement->tidak_menyembunyikan==1){echo "Checked";}?>
                                                        style="margin-left: 5%" /> <b>Ya
                                                        <input type="checkbox" value="2" id="menyembunyikan_off" name="i_menyembunyikan" class="form-check" 
                                                        <?php if ($r_statement->tidak_menyembunyikan==2){echo "Checked";}?>
                                                        style="margin-left: 17%;"/> Tidak
                                                    </div>
                                                    <div id="bertanggung">
                                                        <input type="checkbox" value="1" id="bertanggung_on" name="i_bertanggung_jawab" class="form-check" 
                                                        <?php if ($r_statement->tanggung_jawab==1){echo "Checked";}?>
                                                        style="margin-left: 5%; margin-top: 3%;" /> <b>Ya
                                                        <input type="checkbox" value="2" id="bertanggung_off" name="i_bertanggung_jawab" class="form-check" 
                                                        <?php if ($r_statement->tanggung_jawab==2){echo "Checked";}?>
                                                        style="margin-left: 17%;"/> Tidak
                                                    </div>
                                                </div>
                                            </div>
                                            
                                           
                                            <div style="clear:both;"></div>
                                         
                                        </div><!-- /.box-body -->
                                
                                            <div class="box-footer"  style="background-color: #fff;">
                                                <input class="btn btn-danger" type="submit" value="Save"/>
                                                <a href="<?= $close_button?>" class="btn btn-default" >Close</a>
                                                <a href="member.php?page=print&statement=<?php echo $id?>" class="btn btn-danger1" >Print</a>
                                                
                                                
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

