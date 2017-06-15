<?php
if(!$_SESSION['login']){
    header("location: ../login.php");
}

if(isset($_GET['t']) && $_GET['t'] != "") {
  $get_t = $_GET['t'];
} else {
  $get_t = date('Ymd');
}

//print_r($_POST);
/*if(!isset($_POST['ruangan']) && $_POST['ruangan'] == "") {
  echo "<script>alert('Anda belum memilih ruangan'); location.href='c-order.php?page=dashboard';</script>";
}*/
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

    <?php /*
    <link rel="stylesheet" href="../views/c-order/bootstrap.min.css">
    */ ?>
    <script src="../views/c-order/jquery.min.js"></script>
    <script src="../views/c-order/bootstrap.min.js"></script>

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
    <?php /*
    <script src="../js/responsive/jquery.js"></script>
    */ ?>
    <!-- end accordion -->

    <script src="../js/button_component/modernizr.custom.js"></script>

    <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../views/c-order/bootstrap-timepicker.min.css">

  <?php /*
  <script type="text/javascript" src="../js/table/jquery.js"></script>
  <script type="text/javascript" src="../js/table/jquery.min.js"></script>
  */ ?>
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

  <?php 
  /*if(isset($_POST['ruangan']) && $_POST['ruangan'] != "") {
    //if(isset($_GET['ruangan_id']) && $_GET['ruangan_id'] != "" && isset($_GET['branch_id']) && $_GET['branch_id'] != "") {
          $ruanganid = $_POST['ruangan'];
          $branchid = $_SESSION['branch_id'];
        } else if(isset($_GET['ruangan_id']) && $_GET['ruangan_id'] != "" && isset($_GET['branch_id']) && $_GET['branch_id'] != "") {
          $ruanganid = $_GET['ruangan_id'];
          $branchid = $_GET['branch_id'];
        } else {
          $ruanganid = $ruangan_id;
          $branchid = $_SESSION['branch_id'];
        }*/

      //cek ruangan pertama tiap cabang
      $druang = mysql_fetch_array(mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id] ORDER BY ruangan_id ASC"));
          if(isset($_GET['ruangan_id']) && $_GET['ruangan_id'] != "") {
            $ruanganid = $_GET['ruangan_id'];
          } else {
            $ruanganid = $druang['ruangan_id'];
          }
          
          $branchid = $_SESSION['branch_id'];

          $qinf = mysql_query("SELECT r.`ruangan_infrastruktur_id`, `koordinat_x`, `koordinat_y` FROM `ruangan_infrastruktur` r  WHERE ruangan = '$ruanganid' AND branch = '$branchid'");
          while ($r_infrastruktur__ = mysql_fetch_array($qinf)) {
  ?>

  
  #gambar_<?= $r_infrastruktur__['ruangan_infrastruktur_id']?> {
    position: relative;
    left: <?= $r_infrastruktur__['koordinat_x']?>px;
    top: <?= $r_infrastruktur__['koordinat_y']?>px;
    width: 100px;
    color: white;
    text-align: center;
    cursor: pointer;
  }

  <?php
  } ?>
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

  #kanan{
    float:right;
    width: 200px;
}
  </style>
  <script type="text/javascript">
   // $(window).on('load',function(){
     //   $('#myModal_right').modal('show');
   // });
  </script>
</head>
<body margin-left="0" margin-top="0">
  <div class="header_fixed">
    <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
      <button class="blue_color_button"  type="button"  onClick="javascript: window.location.href = 'home.php'; "><i class="fa fa-bars show-on-mobile"></i>
      <span class="hide-on-mobile">BACK TO MENU</span>
      </button>BACK TO MENU</button>
    </div><!-- morph-button -->
    <?php /*
    <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
      <button class="blue_color_button"  type="button"  onClick="javascript: window.location.href = 'c-order.php?page=dashboard'; "><i class="fa fa-bars show-on-mobile"></i>
      <span class="hide-on-mobile">DASHBOARD</span>
      </button>DASHBOARD</button>
    </div><!-- morph-button -->
    */ ?>
    <!-- <div class="logo_order"></div> -->
  </div>
  <br>
  <section>
    <div class="box">
      <div id="ruangan_box" name="ruangan_box" class="box-body" style="background-color:rgba(255, 255, 255, 0.85);height:100vh;">

      <br><br>
        <?php 
        if(isset($_GET['ruangan_id']) && $_GET['ruangan_id'] != "") {
            $ruanganid = $_GET['ruangan_id'];
          } else {
            $ruanganid = $druang['ruangan_id'];
          }
          $qkursi = mysql_query("SELECT r.`ruangan_infrastruktur_id`, r.`infrastruktur_name`, r.`color`, r.`ruangan_infrastruktur_id`, 
i.`infrastruktur_img` FROM `ruangan_infrastruktur` r 
LEFT JOIN `infrastruktur` i ON i.`infrastruktur_id` = r.`infrastruktur` WHERE ruangan = '$ruanganid' AND branch = '$branchid'");
          while ($rinf = mysql_fetch_array($qkursi)) {
          ?>
<?php
$qdetkursi = mysql_fetch_array(mysql_query("SELECT  tp.`ruangan_infrastruktur_id` AS trans_kursi_id, DATE_FORMAT(tp.`tanggal`, '%d-%M-%Y %H:%i') AS tbook, tp.`tanggal`,  tp.`transaction_id`, 
t.`transaction_code`, m.`member_name`, m.`member_phone`, p.`nama_pemijat`, m.member_alamat, j.`pijat_waktu`,
DATE_FORMAT(tp.`tanggal`, '%H') AS jambook, DATE_FORMAT(tp.`tanggal`, '%i') AS menitbook, j.pijat_harga, j.pijat_name, 
t.transaction_id, DATE_FORMAT(tp.`tanggal`, '%Y-%m-%d') AS t, m.member_id, p.`branch_id`, tk.`ruangan_id`
FROM `transaction_pijat` tp
LEFT JOIN `transactions_tmp` t ON t.`transaction_id` = tp.`transaction_id`
LEFT JOIN members m ON m.`member_id` = t.`member_id` 
LEFT JOIN pemijat p ON p.`pemijat_id` = t.`transaction_detail_pemijat` 
LEFT JOIN pijat j ON j.`pijat_id` = t.`pijat`
LEFT JOIN `transaction_kursi` tk ON tk.`transcaction_id` = tp.`transaction_id`
WHERE tp.`ruangan_infrastruktur_id` = '$rinf[ruangan_infrastruktur_id]' AND tp.`status_pijat` = 0 AND p.`branch_id` = '$branchid' AND tk.ruangan_id = $ruanganid  ORDER BY tp.`transaction_pijat_id` DESC"));

if(isset($qdetkursi['trans_kursi_id']) && $qdetkursi['trans_kursi_id'] != "") {
    $warna = "blue";
  } else {
    $warna = "purple";
  }


                if(isset($qdetkursi['pijat_waktu'])) {
                    $skrng = date("Y-m-d H:i:s");
                    $minutes_to_add = $qdetkursi['pijat_waktu'];

                    $time = new DateTime($qdetkursi['tanggal']);
                    $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

                    $stamp = $time->format('Y-m-d H:i');


                    $start_date = new DateTime($skrng);
                    $end_date = new DateTime($stamp);
                    $interval = $start_date->diff($end_date);
                    $hours   = $interval->format('%h'); 
                    $minutes = $interval->format('%i');
                    $selisihmenit = $hours * 60 + $minutes;

                    if($selisihmenit > 15) {
                      $warna = "blue";
                    } else if($selisihmenit == 0) {
                      $warna = "black";
                    } else {
                      $warna = "red";
                    }

                } else {
                  $selisihmenit = 00;
                }
  
//============================================================================
  /*$date = strtotime($stamp);
  $remaining = $date - time();
  $days_remaining = floor($remaining / 86400);
  $hours_remaining = floor(($remaining % 3600) / 60);*/
  //echo "There are $days_remaining days and $hours_remaining hours left";
//==================================================================================              
?>
          <span class="tooltip tooltip-effect-1" data-toggle="modal" data-target="#myModal_<?=$rinf['ruangan_infrastruktur_id']?>">
            <div id="gambar_<?=$rinf['ruangan_infrastruktur_id']?>" style="background-color: <?=$warna?>; width: 100px">
            <div class="bulet" style="background-color: green">&nbsp;<?=$selisihmenit?>&nbsp;</div>
              <img src="../img/infrastruktur/<?=$rinf['infrastruktur_img']?>" class="meja1">
              <br>
              <strong><?=$rinf['infrastruktur_name']?></strong>
            </div>
          </span>


<div id="myModal_<?=$rinf['ruangan_infrastruktur_id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

  <?php 
      if(isset($qdetkursi['trans_kursi_id']) && $qdetkursi['trans_kursi_id'] != "") {
    ?>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?=$rinf['infrastruktur_name']?>
        <?php if($_SESSION['user_type_id'] == 5) { ?>
          <a class="btn btn-danger" href="c-order.php?page=cancelorder&id=<?=$qdetkursi['transaction_id']?>&kursi=<?=$rinf['ruangan_infrastruktur_id']?>&ruangan=<?=$ruanganid?>&branch=<?=$branchid?>&t=<?=$qdetkursi['t']?>&member=<?=$qdetkursi['member_id']?>" role="button" onclick="return confirm('Apakah anda yakin akan membatalkan order ini?')">CANCEL ORDER</a>
        <?php } ?>
        </h4> 
      </div>
      <div class="modal-body">
        <table width="100%" border="0" cellspacing="0" cellpadding="5" class="table_item" style="margin-right:10px;">
               <tr>
               <tr>
                <td style="width: 150px">Nama:</td>
                <td><?=ucfirst($qdetkursi['member_name'])?></td>
              </tr>
              <tr>
                <td>Alamat:</td>
                <td><?=$qdetkursi['member_alamat']?></td>
              </tr>
              <tr>
                <td>Waktu Mulai:</td>
                <td><?=$qdetkursi['tbook']?></td>
              </tr>
              <tr>
                <td>Waktu Selesai:</td>
                <td>
                <?php echo $stamp; ?></td>
              </tr>
              <tr>
                <td>Terapis:</td>
                <td><?=$qdetkursi['nama_pemijat']?></td>
              </tr>
              <tr>
                <td>Timer:</td>
                <td><?=$selisihmenit?> menit</td>
                <?php //echo $selisihmenit; //echo $interval->format('%R%a minute'); ?> 
              </tr>
              
          </table>

          <table width="100%" border="0" cellspacing="0" cellpadding="5" class="table_item" style="margin-right:10px;">
     <thead>
     <tr>
        <td align="center">No</td>
        <td>Menu</td>
        <td align="right">Qty</td>
        <td align="right">Harga</td>
        <td align="right">Sub Total</td>
      </tr>
      </thead>
      
        <?php /*
        <tr >
        <td align="center" valign="top">1</td>
        <td valign="top"><?=$qdetkursi['pijat_name']?></td>
        <td align="right" valign="top"><?=$qdetkursi['pijat_waktu']?></td>
        <td align="right" valign="top"><?php print number_format($qdetkursi['pijat_harga']); ?></td>
        <td align="right" valign="top"><?php print number_format($qdetkursi['pijat_harga']); ?></td>
      </tr>
        */ ?>
      <?php 
                                        $no = 1;
                                        $pijatharga = 0;
                                        $qaddpijat = mysql_query("SELECT j.`pijat_name`, j.`pijat_harga`, j.pijat_waktu 
                                          FROM `transaction_pijat` p
                                                    LEFT JOIN pijat j ON j.`pijat_id` = p.`pijat_id`
                                                    where p.status_pijat = 0 AND p.ruangan_infrastruktur_id = '".$rinf['ruangan_infrastruktur_id']."'");
                                        while($daddpjt = mysql_fetch_array($qaddpijat)) {
                                        ?>
                                        <tr>
                                        <td align="center" valign="top"><?=$no++?></td>
                                        <td valign="top"><?=$daddpjt['pijat_name']?></td>
                                        <td align="right" valign="top"><?=$daddpjt['pijat_waktu']?></td>
                                        <td align="right" valign="top"><?php print number_format($daddpjt['pijat_harga']); ?></td>
                                        <td align="right" valign="top"><?php print number_format($daddpjt['pijat_harga']); ?></td>
                                        </tr>
                                        <?php $pijatharga += $daddpjt['pijat_harga']; } ?>
      <?php 
      //$no = 2;
      $ttl = 0;
        $qtemp = mysql_query("SELECT d.`transaction_detail_id`, d.transaction_detail_original_price, i.* 
          FROM `transaction_tmp_details` d 
LEFT JOIN item i ON i.`item_id` = d.`transaction_detail_item_qty`
LEFT JOIN `transaction_kursi` k ON k.`transcaction_id` = d.`transaction_id`
WHERE  k.`ruangan_infrastruktur_id` = '".$rinf['ruangan_infrastruktur_id']."' AND k.`status_kursi` = 0");
        while ($dtemp = mysql_fetch_array($qtemp)) {
      ?>
       <tr bgcolor="#361563" style="color:#fff;">
        <td align="center" valign="top"><?=$no?></td>
        <td valign="top"><?=$dtemp['item_name']?></td>
        <td align="right" valign="top"><?php print number_format($dtemp['transaction_detail_original_price']); ?></td>
        <td align="right" valign="top"><?php print number_format($dtemp['item_harga_jual']); ?></td>
        <td align="right" valign="top"><?php print number_format($dtemp['transaction_detail_original_price'] * $dtemp['item_harga_jual']); ?></td>
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
      $ttl += ($dtemp['transaction_detail_original_price'] * $dtemp['item_harga_jual']);
      $no++; } 

      $total = $ttl + $pijatharga;
      //$total = $qdetkursi['pijat_harga'] + $ttl + $pijatharga;

      $sc = $total * 0.05;
      $tax = $total * 0.1;
      $totalkedua = $total + $sc + $tax;
       ?>
      
     </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_total_item" style="font-size: 12px">
      <tr>
        <td  align="right">TOTAL</td>
        <td align="right"><?php print number_format($total); ?></td>
      </tr>
      <tr style="border: 1px; color: black">
        <td  align="right">Service Charge(5%)</td>
        <td align="right"><?php print number_format($sc); ?></td>
      </tr>
      <tr>
        <td  align="right">Tax(10%)</td>
        <td align="right"><?php print number_format($tax); ?></td>
      </tr>
      <tr>
        <td  align="right"><strong>Grand Total</strong></td>
        <td align="right"><strong><?php print number_format($totalkedua); ?></strong></td>
      </tr>

    </table>

        
        <a class="btn btn-danger" href="c-order.php?page=payment&id=<?=$qdetkursi['transaction_id']?>&kursi=<?=$rinf['ruangan_infrastruktur_id']?>&ruangan=<?=$ruanganid?>&branch=<?=$branchid?>&t=<?=$qdetkursi['t']?>&member=<?=$qdetkursi['member_id']?>" role="button">PAYMENT</a>

        <a class="btn btn-primary" href="c-order.php?page=additem&id=<?=$qdetkursi['transaction_id']?>&kursi=<?=$rinf['ruangan_infrastruktur_id']?>&ruangan=<?=$ruanganid?>&branch=<?=$branchid?>&t=<?=$qdetkursi['t']?>&member=<?=$qdetkursi['member_id']?>" role="button">ADD ITEM</a>

        <a class="btn btn-info" href="c-order.php?page=editkursi&id=<?=$qdetkursi['transaction_id']?>&kursi=<?=$rinf['ruangan_infrastruktur_id']?>&ruangan=<?=$ruanganid?>&branch=<?=$branchid?>&t=<?=$qdetkursi['t']?>&member=<?=$qdetkursi['member_id']?>" role="button">PINDAH KURSI</a>

        <a class="btn btn-success" href="c-order.php?page=addpijat&id=<?=$qdetkursi['transaction_id']?>&kursi=<?=$rinf['ruangan_infrastruktur_id']?>&ruangan=<?=$ruanganid?>&branch=<?=$branchid?>&t=<?=$qdetkursi['t']?>&member=<?=$qdetkursi['member_id']?>" role="button">ADD PIJAT</a>
        
      </div>
      <?php /*
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      */ ?>
    </div>

    <?php } else { ?>

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?=$rinf['infrastruktur_name']?></h4>
      </div>
      <div class="modal-body">
        <p><?=$rinf['infrastruktur_name']?> masih kosong</p>
        <?php 
        //$tgl = explode("/", $_POST['i_date']);
        //$tanggal = $tgl[2]."-".$tgl[1]."-".$tgl[0];
        $tanggal = date("Y-m-d");
        ?>
        <a class="btn btn-primary" href="c-order.php?page=order&kursi=<?=$rinf['ruangan_infrastruktur_id']?>&ruangan=<?=$ruanganid?>&branch=<?=$branchid?>&t=<?=$tanggal?>&a=order" role="button">Add Order</a>

        <a class="btn btn-success" href="c-order.php?page=order&kursi=<?=$rinf['ruangan_infrastruktur_id']?>&ruangan=<?=$ruanganid?>&branch=<?=$branchid?>&t=<?=$tanggal?>&a=reserved" role="button">Add Booking</a>
      </div>
      <?php /*
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      */ ?>
    </div>

    <?php } ?>
  </div>
</div>

        <?php } ?>

        <?php //include 'content_right.php'; ?>

        <div id="kanan"  style="overflow-y: scroll; height:600px; margin-top: -200px;">
            

            <?php 
            $qinfra = mysql_query("SELECT r.`ruangan_infrastruktur_id`, r.`infrastruktur_name` FROM `ruangan_infrastruktur` r");
            while($dinfra = mysql_fetch_array($qinfra)) {

              $qpjt = mysql_query("SELECT p.`pijat_name` FROM `transactions_tmp` t
LEFT JOIN pijat p ON p.`pijat_id` = t.`pijat`
LEFT JOIN `transaction_kursi` k ON k.`transcaction_id` = t.`transaction_id`
WHERE k.`ruangan_infrastruktur_id` = $dinfra[ruangan_infrastruktur_id] AND ruangan_id = '$ruanganid'");
              $tpijat = mysql_num_rows($qpjt);
              if($tpijat > 0) {
            ?>
                        <div class="col-md-12" style="padding-left:0; padding-right:10px;">
                            <div class="box">
                             <div class="box-header">
                                    <h3 class="box-title"><?=$dinfra['infrastruktur_name']?></h3>                                    
                                </div>
                                <div class="box-body2 table-responsive">
                                <table id="example1" class="table table-bordered">
                                <?php 
                                /*while($dpjt = mysql_fetch_array($qpjt)) {
                                ?>
                                 <tr>
                                  <td style="width: 10px">1.</td>
                                  <td><?=$dpjt['pijat_name']?></td>
                                </tr>
                                <?php } */ ?>

                                <?php 
                                $no = 1;
                                $qpjt2 = mysql_query("SELECT p.`pijat_id`, p.`pijat_name` FROM `transaction_pijat` t 
LEFT JOIN `pijat` p ON p.`pijat_id` = t.`pijat_id`
WHERE t.status_pijat = 0 AND t.`ruangan_infrastruktur_id` = $dinfra[ruangan_infrastruktur_id]");
                                while($dpjt2 = mysql_fetch_array($qpjt2)) {
                                ?>
                                <tr>
                                  <td style="width: 10px"><?=$no++?>.</td>
                                  <td><?=$dpjt2['pijat_name']?></td>
                                </tr>
                                <?php } ?>

                                <?php 
                                $qitem = mysql_query("SELECT i.`item_name`, d.`transaction_detail_original_price` FROM `transaction_tmp_details` d
LEFT JOIN item i ON i.`item_id` = d.`transaction_detail_item_qty`
LEFT JOIN `transaction_kursi` k ON k.`transcaction_id` = d.`transaction_id`
WHERE k.`ruangan_infrastruktur_id` = $dinfra[ruangan_infrastruktur_id] AND k.`status_kursi` = 0");
                                while($ditem = mysql_fetch_array($qitem)) {
                                ?>
                                <tr>
                                  <td style="width: 10px"><?=$no++?>.</td>
                                  <td><?=$ditem['item_name']?> [<?=$ditem['transaction_detail_original_price']?>]</td>
                                </tr>
                                <?php } ?>

                            </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
          <?php }
           } ?>


        </div>











      </div>
    </div>
  </section>



<div id="myModal_right" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kanan</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  

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
               $qbrc = mysql_query("SELECT * FROM `branches` b WHERE branch_id = '".$_SESSION['branch_id']."'");
               while($r_branch = mysql_fetch_array($qbrc)){?>
                 <?php /*
                 <li><a href="order.php?branch_id=<?= $r_branch['branch_id']?>"><?= $r_branch['branch_name']?></a></li>
                 */ ?>
                 <li><a href="c-order.php?page=list&branch_id=<?= $r_branch['branch_id']?>"><?= $r_branch['branch_name']?></a></li>

                 <?php } ?>
             </ul>
            </div>
           </div>
         </div>
       </div><!-- morph-button -->

       <?php 
       if(isset($_GET['ruangan_id']) && $_GET['ruangan_id'] != "") {
         $druang2 = mysql_fetch_array(mysql_query("SELECT ruangan_name FROM `ruangan` WHERE branch_id = $_SESSION[branch_id] AND ruangan_id = $_GET[ruangan_id] ORDER BY ruangan_id ASC"));
         $ruangan = $druang2['ruangan_name'];
       } else {
        $ruangan = $druang['ruangan_name'];
       }
      

       ?>
       <div class="morph-button morph-button-sidebar morph-button-fixed" style=" bottom: 10px; left: 240px;">
         <button type="button" class="reds_color_button"><?= $ruangan?></button>
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
                     <a href="c-order.php?page=list&branch_id=<?= $r_ruangan['branch_id']?>&ruangan_id=<?= $r_ruangan['ruangan_id']?>&t=<?=$get_t?>">
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
