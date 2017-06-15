<?php
if(!$_SESSION['login']){
    header("location: ../login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
  <title><?php echo $judul ?></title>
		<!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs
    <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
-->
		<link rel="stylesheet" type="text/css" href="../css/style_table.css" />
		<!-- tooltip -->
 		<link rel="stylesheet" type="text/css" href="../css/tooltip/tooltip-classic.css" />
 		<!-- button component-->
 		<link rel="stylesheet" type="text/css" href="../css/button_component/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/component.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/content.css" />
    <!-- vertical scroll -->
    <link rel="stylesheet" href="../css/vertical_scroll/main.css">
    <!-- vertical scroll new -->
    <link rel="stylesheet" href="../css/vertical_scroll_new/style.css">
		<link rel="stylesheet" href="../css/vertical_scroll_new/jquery.mCustomScrollbar.css">         <!-- modal -->
    <link rel="stylesheet" type="text/css" href="../css/modal/component.css" />
    <!-- responsive -->
    <link rel="stylesheet" type="text/css" href="../css/responsive/jquery-ui.css" />
    <link href="../css/responsive/media.css" rel="stylesheet">
    <script src="../js/responsive/jquery.js"></script>
    <!-- end accordion -->

		<script src="../js/button_component/modernizr.custom.js"></script>

  <script type="text/javascript" src="../js/table/jquery.js"></script>
  <script type="text/javascript" src="../js/table/jquery.min.js"></script>
  <style media="screen">

  .blue_color_button{
    background-color: #fff !important;
    color: rgba(102, 80, 115, 0.51) !important;
    border: 1px solid #665073 !important;
  }

  section {
    padding: 2em;
    text-align: justify;
    max-width: 1300px;
    margin: 0 auto;
    clear: both;
  }

  <?php while ($r_infrastruktur__ = mysql_fetch_array($q_infrastruktur__)) {?>

  #theImg_<?= $r_infrastruktur__['ruangan_infrastruktur_id']?>,
  #text_<?= $r_infrastruktur__['ruangan_infrastruktur_id']?> {
          position: absolute;
          /*width: 100px;
          height: 100px;*/
          margin-left:
          <?php
          $data_x = ($r_infrastruktur__['koordinat_x']) ? $r_infrastruktur__['koordinat_x'] : 0;
          echo $data_x ?>px;
          margin-top:
          <?php
          $data_y = ($r_infrastruktur__['koordinat_y']) ? $r_infrastruktur__['koordinat_y'] : 0;
          echo $data_y ?>px;
          cursor: pointer;
  }
  #text_<?= $r_infrastruktur__['ruangan_infrastruktur_id']?> {
    position: absolute;
    /*width: 100px;
    height: 100px;*/
    margin-left:
    <?php
    $data_x = ($r_infrastruktur__['koordinat_x']) ? $r_infrastruktur__['koordinat_x'] : 0;
    $data_x=$data_x-10;
    echo $data_x ?>px;
    margin-top:
    <?php
    $data_y = ($r_infrastruktur__['koordinat_y']) ? $r_infrastruktur__['koordinat_y'] : 0;
    echo $data_y ?>px;
    cursor: pointer;
  }
  h2#text_<?= $r_infrastruktur__['ruangan_infrastruktur_id']?> {
     font-size: 14px;
     position: absolute;
     top: 5px;
     left: 0;
     width: 130px;
  }
  h2#text_<?= $r_infrastruktur__['ruangan_infrastruktur_id']?>:hover{
    top: -20px;
    font-size: 18px;
    margin: 0;
    padding: 0;
    width: 130px;
  }

  <?php } ?>
  .reds_color_button{
    background-color: #665073!important;
  }
  .morph-button-fixed > button {
    z-index: 2;
}

  .morph-button-sidebar .morph-content {
      background: rgb(102, 80, 115);
  }

  .bulet {
    background: #393;
    color: #fff;
    width: 30px;
    height: 30px;
    line-height: 33px;
    margin-top: -43px;
    margin-left: 40px;
    font-size: 18px;
    border-radius: 70%;
    
  }
  </style>
</head>
<body margin-left="0" margin-top="0">
  <div class="header_fixed">
		<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
			<button class="blue_color_button"  type="button"  onClick="javascript: window.location.href = 'home.php'; "><i class="fa fa-bars show-on-mobile"></i>
      <span class="hide-on-mobile">BACK TO MENU</span>
      </button>BACK TO MENU</button>
		</div><!-- morph-button -->
		<!-- <div class="logo_order"></div> -->
  </div>
  <br>
  <section>
    <div class="box">
      <div id="ruangan_box" name="ruangan_box" class="box-body" style="background-color:rgba(255, 255, 255, 0.85);height:100vh;">
        <?php while ($r_infrastruktur_ = mysql_fetch_array($q_infrastruktur_)) {
          $where_infrastruktur_id = "WHERE infrastruktur_id = '".$r_infrastruktur_['infrastruktur']."'";
          $img = select_config_by('infrastruktur','infrastruktur_img', $where_infrastruktur_id);?>
          
          
<?php 
$skrng = date('Y-m-d');
      $qpjt = mysql_fetch_array(mysql_query("SELECT t.*, p.*, m.`member_name`, m.`member_alamat`, m.`member_phone`, DATE_FORMAT(k.`datebook`, '%d %M %Y %H:%i:%s') AS tgl, DATE_FORMAT(k.`dateinsert`, '%Y-%m-%d %H:%i:%s') AS tglins, DATE_FORMAT(k.`dateinsert`, '%Y-%m-%d') AS tanggal, DATE_ADD(dateinsert, INTERVAL p.`pijat_waktu` MINUTE) AS a, t.ket
FROM `transactions_tmp` t
LEFT JOIN pijat p ON p.`pijat_id` = t.`pijat`
LEFT JOIN members m ON m.`member_id` = t.`member_id`
LEFT JOIN `transaction_kursi` k ON k.`transcaction_id` = t.`transaction_id`
WHERE transaction_code = 0 AND ruangan_id = '".$_GET['ruangan_id']."' AND ruangan_infrastruktur_id = '".$r_infrastruktur_['ruangan_infrastruktur_id']."' AND DATE_FORMAT(t.`transaction_date`, '%Y%m%d') = '$_GET[t]'"));
//WHERE transaction_id = '".$_GET['id']."' AND transaction_code = 0 AND ruangan_id = '".$_get['ruangan_id']."' AND ruangan_infrastruktur_id = 12"
      ?>

<script type="text/javascript">

    

</script>
<span class="tooltip tooltip-effect-1">
  <div id="theImg_<?=$r_infrastruktur_['ruangan_infrastruktur_id']?>" class="meja1">
  
        
        <div class="tooltip-item">                     
          <div class="count_item_ordered">
            <img src="../img/infrastruktur/<?= $img?>">
            <h2 style="font-size: 18px;"><?= $r_infrastruktur_['infrastruktur_name']?></h2>
            <?php 
          $skrg = date("Y-m-d H:i:s");
          //echo date_format(date($qpjt['tglins'], strtotime($qpjt['pijat_waktu'].' minute')), 'd M Y H:i:s'); 
          if(strtotime($qpjt['tgl']) > strtotime(date("Y-m-d H:i:s"))) {
            $reserv = 1;
            $timet = "<strong>Reservasi - ".date("d M Y", strtotime($qpjt['tgl']))."</strong>";
            $timet1 = "<strong>Reservasi - ".date("d M Y", strtotime($qpjt['tgl']))."</strong>";
            $selsh = 0;
            $cls = "green !important";
          } else {
            $reserv = 0;
            $qtime = mysql_fetch_array(mysql_query("SELECT TIMEDIFF('$qpjt[a]','$skrg') as selisih"));
            $ntime = explode(':', $qtime['selisih']);
            $timet = $qpjt['tglins'];
            $timet = strtotime($timet) + ($qpjt['pijat_waktu']*60); // Add 1 hour
            $tl = strlen($ntime[0]);
            if($tl > 2) {
              $timet1 = "00"; //date('d M Y - H:i:s', $timet) ." (". $qtime['selisih'] .")"; // Back to string
              

             // if() {

              //} else {
                $timet2 = "00"; //"minus ".$ntime[0].":".$ntime[1]; // 
             // }
              
            } else {

              if($qpjt['tanggal']==date("Y-m-d")) {
                $timet1 = date('d M Y - H:i:s', $timet) ." (". $qtime['selisih'] .")"; // Back to string
              } else {
                $timet1 = "Reserved";
              }

              //$jamakhir = date('d M Y - H:i:s', $timet);
              /*if($qpjt['ket']=="reserved") {
                $timet1 = date('d M Y - H:i:s', $timet) ." (". $qtime['selisih'] .")"; // Back to string
              } else {
                $timet1 = date('d M Y - H:i:s', $timet) ." (". $qtime['selisih'] .")"; // Back to string
              }*/
              if($ntime[0] > 0) {
                $arr = explode(":", $ntime[0].":".$ntime[1]);
                $timet2 = $arr[0] * 60 + $arr[1];
              } else {
                $timet2 = $ntime[1]; // date('d M Y - H:i:s', $timet) ." (". $qtime['selisih'] .")"; // Back to string
              }
              
            }

            //echo $timet1."/".$timet;
          
            
            $selsh = $ntime[1]; //$qtime['selisih'];
            //if($qtime['selisih'] > 10) {

            //echo $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";

            if($timet2 > 10) {
              $cls = "green !important";
            } else {
              $cls = "red !important";
            }
          }

          
          ?>
          
          </div>
          <?php if(isset($qtime['selisih'])) { ?>
            <div class="bulet" style="background-color: <?=$cls?>;">&nbsp;<?=$timet2?>&nbsp;</div>
          <?php } ?>
          
        </div>
                
        <span class="tooltip-content clearfix">
          
            
<div class="table_total_item">
  <?= $r_infrastruktur_['infrastruktur_name']?> <?php //echo $ntime[1]; echo "SELECT MINUTE(TIMEDIFF('$qpjt[a]','$skrg')) as selisih"; ?>
</div>

<?php 
//cek apakah book atau tidak
if(isset($_GET['ruangan_id']) && $_GET['ruangan_id'] != "") { $ruangan = $_GET['ruangan_id']; } else { $ruangan = 9; }
if(isset($_GET['branch_id']) && $_GET['branch_id'] != "") { $branch_id = $_GET['branch_id']; } else { $branch_id = 6; }
$dsql = mysql_fetch_array(mysql_query("SELECT trans_kursi_id FROM `transaction_kursi` WHERE ruangan_infrastruktur_id = '".$r_infrastruktur_['ruangan_infrastruktur_id']."' AND ruangan_id = '".$ruangan."' AND branch_id = '".$branch_id."' AND DATE_FORMAT(datebook, '%Y%m%d') = '$_GET[t]' AND status_kursi = 0"));

//cho "SELECT trans_kursi_id FROM `transaction_kursi` WHERE ruangan_infrastruktur_id = '".$r_infrastruktur_['ruangan_infrastruktur_id']."' AND ruangan_id = '".$ruangan."' AND branch_id = '".$branch_id."' AND DATE_FORMAT(datebook, '%Y%m%d') = '$_GET[t]'";
if($dsql['trans_kursi_id'] > 0) {
?>

  <span class="tooltip-text2 scrollpanel no4 content">
  <table width="100%" border="0" cellspacing="0" cellpadding="5" class="table_item" style="margin-right:10px;">
               <tr>
               <tr>
                <td>Nama</td>
                <td><?=$qpjt['member_name']?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><?=$qpjt['member_alamat']?></td>
              </tr>
              <tr>
                <td>Waktu Order</td>
                <td><?=date("d M Y", strtotime($qpjt['tgl']))?></td>
              </tr>
              <tr>
                <td>Terapis</td>
                <td><?=$qpjt['transaction_detail_pemijat']?></td>
              </tr>
              
              <td>Timer</td>
                <td>
                <?php echo $timet1; ?></td>
              </tr>
              
          </table>


    <table width="100%" border="0" cellspacing="0" cellpadding="5" class="table_item" style="margin-right:10px;">
     <thead>
     <tr>
        <td align="center">No</td>
        <td>Menu</td>
        <td align="right">Qty</td>
        <td align="right">Harga</td>
      </tr>
      </thead>
      
        <tr >
        <td align="center" valign="top">1</td>
        <td valign="top"><?=$qpjt['pijat_name']?></td>
        <td align="right" valign="top"><?=$qpjt['pijat_waktu']?></td>
        <td align="right" valign="top"><?php print number_format($qpjt['pijat_harga']); ?></td>
      </tr>
      <?php 
      $no = 2;
      $ttl = 0;
        $qtemp = mysql_query("SELECT d.`transaction_detail_id`, d.transaction_detail_original_price, i.* 
          FROM `transaction_tmp_details` d 
LEFT JOIN item i ON i.`item_id` = d.`transaction_detail_item_qty`
WHERE d.transaction_id = '".$_GET['id']."' AND d.transaction_detail_status = 0");
        while ($dtemp = mysql_fetch_array($qtemp)) {
      ?>
       <tr bgcolor="#361563" style="color:#fff;">
        <td align="center" valign="top"><?=$no?></td>
        <td valign="top"><?=$dtemp['item_name']?></td>
        <td align="right" valign="top"><?php print number_format($dtemp['transaction_detail_original_price']); ?></td>
        <td align="right" valign="top"><?php print number_format($dtemp['item_harga_jual']); ?></td>
        <?php /*
        <td align="right" valign="top">
        <input type="checkbox" name="i_status_id_18432" value="1" onclick='return order_status(18432)' />
       
       </td>
        <td align="right" valign="top">
          
            <input type="checkbox" name="i_oot" value="1"  checked="checked" disabled="disabled"/>
       </td>
        */ ?>
      </tr>
      <?php 
      $ttl += $dtemp['item_harga_jual'];
      $no++; } 

      $total = $qpjt['pijat_harga'] + $ttl;
      ?>
      
     </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_total_item">
      <tr>
        <td>TOTAL</td>
        <td align="right"><?php print number_format($total); ?></td>
      </tr>
    </table>
    <?php if($reserv == 0) { ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <?php /*
        <td width="17%"><a href="transaction_new.php?page=list&table_id=37" style="text-decoration:none;"><div class="btn_edit_item">EDIT </div></a></td>
        */ ?>
        <td width="20%">
        <a href="payment.php?table_id=<?=$r_infrastruktur_['ruangan_infrastruktur_id']?>&branch_id=<?=$_GET['branch_id']?>&ruangan_id=<?=$_GET['ruangan_id']?>&ruangan_infrastruktur_id=<?=$r_infrastruktur_['ruangan_infrastruktur_id']?>&id=<?=$qpjt['transaction_id']?>&t=<?=$_GET['t']?>" style="text-decoration:none;"><div class="btn_payment">BAYAR</div></a>
          
        
        </td>
        <td width="24%">
        <a href="#" onclick="if (confirm('Apakah anda yakin akan men-cancel order ini?')) window.location.href='transaksi.php?page=cancelorder&id=<?=$qpjt['transaction_id']?>';"><div class="btn_cancel">CANCEL</div></a>
          
        
        </td>
        <?php /*
        <td width="20%">
        <a href="print_order.php?table_id=37&building_id=8&type=0" style="text-decoration:none;"><div class="btn_print">Dapur</div></a>
        </td>
      <td width="19%">
        <a href="print_order.php?table_id=37&building_id=8&type=4" style="text-decoration:none;"><div class="btn_print">Bar</div></a>
        </td>
        */ ?>
      </tr>
    </table>
    <?php } ?>
  </span>

      <?php } else { ?>



<span class="tooltip-text2 scrollpanel no4 content">
    
    <div class="table_total_item" style="margin-bottom:10px; text-align:center;">
    Masih Kosong
    </div>

<div class="row">
  <div class="form-group">
    <div class="col-xs-12" style="padding:3px;">
    <?php if(isset($_GET['member']) && $_GET['member'] != "") { ?>
      <a href="transaksi.php?page=addorder&member=<?=$_GET['member']?>&id=<?=$_GET['id']?>&kursi=<?=$r_infrastruktur_['ruangan_infrastruktur_id']?>&ruangan_id=<?=$ruangan?>&branch_id=<?=$_GET['branch_id']?>&t=<?=$_GET['t']?>" style="text-decoration:none;">
        <div class="btn_add_order">ADD ORDER</div>
      </a>
      <?php } else { ?>
      <a href="transaction.php" style="text-decoration:none;">
        <div class="btn_add_order">ADD ORDER</div>
      </a>
      <?php } ?>
    </div>
  </div>
</div>

  </span>
      
   

      <?php } ?>
  </div>
</span> 






        <?php } ?>

        <?php include 'content_right.php'; ?>

      </div>
      <input type="hidden" name="ruangan_id" id="ruangan_id" value="<?= $ruangan_id?>">
    </div>
  </section>

  

   <div class="footer_fixed">
     <div class="morph-button morph-button-sidebar morph-button-fixed">
       <button type="button" class="reds_color_button"><?= $branch_name?></button>
       <div class="morph-content">
         <div>
           <div class="content-style-sidebar">
             <span class="icon icon-close">Close the overlay</span>
             <h2>Cabang</h2>
             <ul>
               <?php
               while($r_branch = mysql_fetch_array($q_branch)){?>
                 <?php /*
                 <li><a href="order.php?branch_id=<?= $r_branch['branch_id']?>"><?= $r_branch['branch_name']?></a></li>
                 */ ?>
                 <li><a href="order.php?page=list&member=<?=$_GET['member']?>&id=<?=$_GET['id']?>&branch_id=<?= $r_branch['branch_id']?>&ruangan_id=<?=$_GET['ruangan_id']?>&t=<?=$_GET['t']?>"><?= $r_branch['branch_name']?></a></li>

                 <?php } ?>
             </ul>
            </div>
           </div>
         </div>
       </div><!-- morph-button -->
       <div class="morph-button morph-button-sidebar morph-button-fixed" style=" bottom: 10px; left: 240px;">
         <button type="button" class="reds_color_button"><?= $ruangan_name?></button>
         <div class="morph-content reds_color_button">
           <div>
             <div class="content-style-sidebar">
               <span class="icon icon-close">Close the overlay</span>
               <h2>Ruangan</h2>
               <ul>
                 <?php
                 while($r_ruangan = mysql_fetch_array($q_ruangan)){ ?>
                   <li>
                     <?php /*
                     <a href="order.php?branch_id=<?= $branch_id?>&ruangan_id=<?= $r_ruangan['ruangan_id']?>">
                       <?= $r_ruangan['ruangan_name']?>
                     </a>
                     */ ?>
                     <a href="order.php?page=list&member=<?=$_GET['member']?>&id=<?=$_GET['id']?>&branch_id=<?= $r_ruangan['branch_id']?>&ruangan_id=<?= $r_ruangan['ruangan_id']?>&t=<?=$_GET['t']?>">
                       <?= $r_ruangan['ruangan_name']?>
                     </a>
                   </li>
                   <?php } ?>
               </ul>
             </div>
           </div>
         </div>
       </div><!-- morph-button -->
       <div class="morph-button morph-button-sidebar morph-button-fixed" style=" bottom: 10px; float:;">
         <?php /*
         <button type="button" class="reds_color_button">clnlcnkcn</button>
         */ ?>
         <div class="morph-content reds_color_button">
           <div>
             <!-- <div class="content-style-sidebar">
               <span class="icon icon-close">Close the overlay</span>
               <h2>Ruangan</h2>
               <ul>
                 <?php
                 while($r_ruangan = mysql_fetch_array($q_ruangan)){ ?>
                   <li>
                     <a href="order.php?branch_id=<?= $branch_id?>&ruangan_id=<?= $r_ruangan['ruangan_id']?>">
                       <?= $r_ruangan['ruangan_name']?>
                     </a>
                   </li>
                   <?php } ?>
               </ul>
             </div> -->
           </div>
         </div>
       </div><!-- morph-button -->
     </div>

     
    
     

  <script src="../js/function.js" type="text/javascript"></script>
  <!-- Bootstrap
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>-->
  <!-- DATA TABES SCRIPT -->
  <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
  <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
  	<!-- date-range-picker -->
  <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
  <!-- InputMask
  <script src="../js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
  <script src="../js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
  <script src="../js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
  -->
  <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
  <script>window.jQuery || document.write('<script src="../js/vertical_scroll_new/jquery-1.11.0.min.js"><\/script>')</script>
  <script src="../js/vertical_scroll_new/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="../js/button_component/classie.js"></script>
  <script src="../js/button_component/uiMorphingButton_fixed.js"></script>
  <script src="../js/responsive/accordion.js"></script>
  <!-- modal -->
  <script src="../js/modal/classie.js"></script>
  <script src="../js/modal/modalEffects.js"></script>
  <script>
			(function() {
				var docElem = window.document.documentElement, didScroll, scrollPosition;

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();

				[].slice.call( document.querySelectorAll( '.morph-button' ) ).forEach( function( bttn ) {
					new UIMorphingButton( bttn, {
						closeEl : '.icon-close',
						onBeforeOpen : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterOpen : function() {
							// can scroll again
							canScroll();
						},
						onBeforeClose : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterClose : function() {
							// can scroll again
							canScroll();
						}
					} );
				} );

				// for demo purposes only
				[].slice.call( document.querySelectorAll( 'form button' ) ).forEach( function( bttn ) {
					bttn.addEventListener( 'click', function( ev ) { ev.preventDefault(); } );
				} );
			})();
		</script>
</body>
</html>
