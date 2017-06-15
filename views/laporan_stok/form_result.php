<div class="row">
<?php
$title = array(
		"Jumlah Hari",
		"Item Terlaris"
		);

 $content = array($jumlah_hari, $pijat_terlaris);
for($i=0; $i<=1; $i++){
?>
                        <div class="col-lg-3 col-xs-6" >
                            <!-- small box -->
                            <div  style="background-color:#FFF; ">
                                     <div class="box box-primary" style="padding:10px; height:100px;">
                               <?php
                              if($i==3){
                                ?>
                                 <span style="font-size:24px; font-weight:bold;">
                                <?php

                              }else{
                               ?>
                                    <span style="font-size:24px; font-weight:bold;">
                                      <?php
                                    }
                                      ?>
                                        <?= $content[$i]?>
                                    </span>
                                    <p>
                                       <?= $title[$i]?>
                                    </p>
                             
                               </div>
                               
                            </div>
                        </div><!-- ./col -->
                        
                        
                      <?php
}
					  ?>
                       
                    </div><!-- /.row -->