<?php

if(!$_SESSION['login']){
    header("location: ../login.php");
}

$no_item = 1;
$total_price = 0;
$qpjt = mysql_query("SELECT t.*, p.*, m.`member_name`, m.member_id,  m.`member_alamat`, m.`member_phone`, DATE_FORMAT(k.`datebook`, '%d %M %Y %H:%i:%s') AS tgl, DATE_FORMAT(k.`dateinsert`, '%Y-%m-%d %H:%i:%s') AS tglins
FROM `transactions_tmp` t
LEFT JOIN pijat p ON p.`pijat_id` = t.`pijat`
LEFT JOIN members m ON m.`member_id` = t.`member_id`
LEFT JOIN `transaction_kursi` k ON k.`transcaction_id` = t.`transaction_id`
WHERE transaction_code = 0 AND ruangan_id = '".$_GET['ruangan_id']."' AND ruangan_infrastruktur_id = '".$_GET['ruangan_infrastruktur_id']."' AND DATE_FORMAT(t.`transaction_date`, '%Y%m%d') = '$_GET[t]'");
$row_item = mysql_fetch_array($qpjt);
                                      
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $judul; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Popup Modal -->
        <link href="../css/popModal.css" type="text/css" rel="stylesheet" >
        <!-- Preview -->
        <link href="../css/preview.css" type="text/css" rel="stylesheet" >
         <!-- iCheck for checkboxes and radio inputs -->
        <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
         <!-- daterange picker -->
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap time Picker -->
        <link href="../css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <!-- datepicker -->
       <link href="../css/datepicker/datepicker.css" rel="stylesheet">

       <link rel="stylesheet" type="text/css" href="../css/style_table.css" />
  <!-- tooltip -->
  <link rel="stylesheet" type="text/css" href="../css/tooltip/tooltip-classic.css" />
  <!-- button component-->
  <link rel="stylesheet" type="text/css" href="../css/button_component/component.css" />
  <link rel="stylesheet" type="text/css" href="../css/button_component/content.css" />
  <!-- lookup -->
  <link rel="stylesheet" type="text/css" href="../css/lookup/bootstrap-select.css">
  <!-- Button -->
  <link rel="stylesheet" type="text/css" href="../css/button/component.css" />
  <!-- tooptip meja -->
  <link rel="stylesheet" type="text/css" href="../css/tooltip/tooltip-classic.css" />
  <link rel="stylesheet" type="text/css" href="../css/responsive/payment.css" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
  <!-- footable
  <link href="../css/footable/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css"/>
  <link href="../css/footable/footable.standalone.css" rel="stylesheet" type="text/css"/>
  <script src="../js/footable/footable.js?v=2-0-1" type="text/javascript"></script>
  <script src="../js/footable/footable.sort.js?v=2-0-1" type="text/javascript"></script>
  <script src="../js/footable/footable.filter.js?v=2-0-1" type="text/javascript"></script>
  <script src="../js/footable/footable.paginate.js?v=2-0-1" type="text/javascript"></script>
  <script src="../js/footable/bootstrap-tab.js" type="text/javascript"></script>
  -->
  <!-- jQuery 2.0.2 -->
  <script src="../js/jquery.js"></script>
  <script src="../js/function.js" type="text/javascript"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>
  <!-- DATA TABES SCRIPT -->
  <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
  <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
  <!-- select -->
  <script type="text/javascript" src="../js/lookup/bootstrap-select.js"></script>
    </head>
<body class="skin-blue">
 <div class="header_fixed">
    <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
      <button class="blue_color_button hide-on-mobile"  type="button"  onClick="javascript: window.location.href = 'order.php'; ">BACK TO ORDER</button>
    </div><!-- morph-button -->
    <?php /*
    <div class="logo_order hide-on-mobile"></div>
    <div class="logo_order Show-on-mobile" type="button"  onClick="javascript: window.location.href = 'order.php';"></div>
    */ ?>
 </div>
  <br>
  <br>
  
  <!-- header logo: style can be found in header.less -->
     <?php
          if(isset($_GET['err']) && $_GET['err'] == 1){
          ?>
          <section class="content_new">

          <div class="alert alert-warning alert-dismissable">
          <i class="fa fa-warning"></i>
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <b>Simpan Gagal !</b>
         Pembayaran tidak boleh lebih kecil dari total
          </div>

          </section>
          <?php
          }
	?>
          <!-- Main content -->
          <br>
          <section class="content">
            <div class="container">
              <div class="row">
                  <div class="col-md-9 col-md-offset-0">
                      <div class="box_payment">
                        <div class="payment_title">bayar bill</div>
                          <div class="box-body2 table-responsive">
                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                             <input type="hidden" name="table_id" value="<?=$_GET['table_id']?>">
                             <input type="hidden" name="branch_id" value="<?=$_GET['branch_id']?>">
                             <input type="hidden" name="ruangan_id" value="<?=$_GET['ruangan_id']?>">
                             <input type="hidden" name="ruangan_infrastruktur_id" value="<?=$_GET['ruangan_infrastruktur_id']?>">
                             <input type="hidden" name="id" value="<?=$_GET['id']?>">
                             <input type="hidden" name="t" value="<?=$_GET['t']?>">


                               <input id="i_member" type="hidden" name="i_member" value="<?= $member_id?>">
                               <div class="col-md-8">
                                 <div class="row">
                                   <div class="payment_group">
                                     <b> Tipe Pembayaran</b>
                                     <br>
                                     <br>
                                     <div id="payment_type">
                                        <label class="blue" style="background-color: #eee;">
                                            <input checked type="radio" name="i_payment_method" id="i_payment_method" value="1" checked onclick="payment_method(1)" style="position: absolute;
      opacity: 0;">
                                           <span  onclick="get_change(1)" id="i_span_1" class="i_span btn btn-danger">
                                          Cash </span>
                                        </label>
                                        <label>
                                            <input style="position: absolute;
opacity: 0;" type="radio" name="i_payment_method" id="i_payment_method" value="2" onclick="payment_method(2)">
                                            <span  onclick="get_change(2)" id="i_span_2" class="i_span btn btn-danger">
                                          Debit </span>
                                        </label>
                                        <label>
                                            <input style="position: absolute;
opacity: 0;" type="radio" name="i_payment_method" id="i_payment_method" value="3" onclick="payment_method(3)">
                                            <span  onclick="get_change(3)" id="i_span_3" class="i_span btn btn-danger">
                                          Credit </span>
                                        </label>
                                        <label>
                                            <input style="position: absolute;
opacity: 0;" type="radio" name="i_payment_method" id="i_payment_method" value="4" onclick="payment_method(4)">
                                            <span  onclick="get_change(4)" id="i_span_4" class="i_span btn btn-danger">
                                          Voucher </span>
                                         </label>
                                          <!--<label>
                                              <input style="position: absolute;
opacity: 0;" type="radio" name="i_tax" id="i_tax" value="5" onclick="tax()">
                                              <span  onclick="get_change(5)" id="i_span_5" class="i_span">
                                            Tax </span>
                                          </label> -->
                                     </div>
                                   </div>
                                   <div class="payment_group" id="i_member_v" style="display:none;" >
                                     <div class="row">
                                       <div class="col-md-8">
                                         <?php
                                            $q_member = mysql_query("select * from members where member_id = '$member_id'");
                                            $row_member = mysql_fetch_array($q_member);
                                          ?>
                                          <div><label>Nama    : <?= $row_member['member_name'] ?></label></div>
                                          <div><label>Alamat  : <?= $row_member['member_alamat'] ?></label></div>
                                          <div><label>Telepon : <?= $row_member['member_phone'] ?></label></div>
                                          <div><label>Email : <?= $row_member['member_email'] ?></label></div>
                                          <div><label>Diskon : <?= $row_member['member_discount'] ?>%</label></div>
                                          <input type="hidden" id="i_diskon_member" value="<?= $row_member['member_discount'] ?>"/>
                                          <!-- <div><label>Type Diskon : <?= $row_member['member_discount'] ?></label></div> -->
                                       </div>
                                     </div>
                                   </div>
                                    <div class="payment_group" id="bank_frame" style="display:none; width:100%;">
                                     <b> Bank</b>
                                      <br>
                                      <div class="row">
                                      <div class="col-md-6" style="padding-left:0px; ">
                                        <select id="basic" name="i_bank_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" style="min-height:100px;" />
                                           <?php
                                           $q_bank = mysql_query("select * from banks order by bank_id");
                                           while($r_bank = mysql_fetch_array($q_bank)){ ?>
                                             <option value="<?= $r_bank['bank_id'] ?>"><?= $r_bank['bank_name']?></option>
                                           <?php } ?>
                                         </select>
                                       </div>
                                       <div class="col-md-6" style="padding-left:0px; ">
                                          <input type="text" name="i_bank_account" id="i_bank_account" class="form-control" value="" placeholder="No Kartu" style="text-align:right; font-size:20px;"/>
                                       </div>
                                       </div>
                                    </div>
                               <div class="payment_group" id="voucher_frame" style="display:none; width:100%;">
                               <b>Voucher</b>
                                <br>
                                 <select  id="basic" name="i_voucher_id" size="1" onchange="getCombo(this)" class="selectpicker show-tick form-control" data-live-search="true" style="min-height:100px;" onchange="update_voucher(this.value)" />
                                     <option value="0">Pilih Voucher</option>
                                     <?php
                                      $q_voucher = mysql_query("SELECT a.*, b.voucher_type_name,c.voucher_code, c.voucher_value
                                                        FROM voucher_detail a	
                                                        JOIN voucher_types b ON b.voucher_type_id = a.voucher_type_id	
                                                        JOIN vouchers c ON c.voucher_id = a.voucher_id						
                                                        ORDER BY a.id_voucher_detail DESC");
                                      while($r_voucher = mysql_fetch_array($q_voucher)){
                                      ?>
                                       <option value="<?= $r_voucher['id_voucher_detail'] ?>">
                                                <?php if($r_voucher['voucher_type_id'] == 1){
                                                    echo $r_voucher['no_voucher']." ( Rp. ". $r_voucher['voucher_value']." )";}
                                                else{ 
                                                    echo $r_voucher['no_voucher']." ( ". $r_voucher['voucher_value']."  %)" ;}  ?></option>
                                       <?php } ?>
                                  </select>
                               </div>
                               <?php
                                      /*$total_price2 = 0;
                                     while($row_item2 = mysql_fetch_array($query2)){
                                        $total_price2 = $total_price2 + $row_item2['transaction_detail_total']; } ?>
                								<?php
                									$totalawal  = $total_price2;
                									// $svc	    = 5/100*$totalawal;
                									//$totalkedua =	$totalawal;
                                  if($member_id==0){
                                      $totalkedua =	$totalawal;
                                  }else {
                                      $tot2 = $totalawal*$row_member['member_discount']/100;
                                      $totalkedua =	$totalawal-$tot2;
                                  }
                									$totalkedua=ceil($totalkedua);
                									if (substr($totalkedua,-2)!=00){
                										if(substr($totalkedua,-2)<50){
                											$totalkedua=round($totalkedua,-2)+100;
                										}else{
                											$totalkedua=round($totalkedua,-2);
                										}
                                  }*/
                                  $tjual = 0;
                                  $qtemp = mysql_query("SELECT d.`transaction_detail_id`, i.* 
                                      FROM `transaction_tmp_details` d 
                            LEFT JOIN item i ON i.`item_id` = d.`transaction_detail_item_qty`
                            WHERE d.transaction_id = '".$_GET['id']."' AND d.transaction_detail_status = 0");
                                    while ($dtemp = mysql_fetch_array($qtemp)) {
                                      $tjual += $dtemp['item_harga_jual'];
                                    }
         
                                  $total_price = $tjual + $row_item['pijat_harga'];
                                  $sc = $total_price * 0.05;
                                  $tax = $total_price * 0.1;
                                  $totalkedua = $total_price + $sc + $tax;
                                   ?>
                              <div class="col-md-12" style="padding:0px;">
                                <div class="payment_group">
                                  <div class="calc_title">
                                    <b>Nominal</b>
                                  </div>
                                    <input min="0" required type="text" name="i_payment" id="i_payment" class="form-control calc_nominal" value="<?php echo number_format($totalkedua); ?>" style="text-align:right;" onChange="update_change()"/>
                                  <div class="row hide-on-mobile" style="margin-top:10px;">
                                    <div class="col-md-5" style="padding:0px;">
                                      <div>
                                        <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;">
                                          <div class="calc_button_right" style="background-color: #6B346A" onclick="add_clear(50000)">50</div>
                                        </div>
                                        <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;">
                                          <div class="calc_button_right" style="background-color: #6B346A" onclick="add_clear(100000)">100</div>
                                        </div>
                                      </div>
                                      <div>
                                        <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;">
                                          <div class="calc_button_right" style="background-color: #6B346A" onclick="add_clear(150000)">150</div>
                                        </div>
                                        <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;">
                                          <div class="calc_button_right"  style="background-color: #6B346A" onclick="add_clear(200000)">200</div>
                                        </div>
                                      </div>
                                      <div>
                                        <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;">
                                          <div class="calc_button_right" style="background-color: #6B346A" onclick="add_numeric(5000)">+5</div>
                                        </div>
                                        <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;">
                                          <div class="calc_button_right" style="background-color: #6B346A" onclick="add_numeric(10000)">+10</div>
                                        </div>
                                      </div>
                                      <div>
                                        <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;">
                                          <div class="calc_button_right" style="background-color: #6B346A" onclick="add_numeric(15000)">+15</div>
                                        </div>
                                        <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;">
                                          <div class="calc_button_right" style="background-color: #6B346A" onclick="add_numeric(20000)">+20</div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-7" style="padding:0px;">
                                      <div style="border-top-left-radius:5px; border-top-right-radius:5px;">
                                        <div class="col-md-4" style="padding:0px;">
                                          <div class="calc_button" style="border-top-left-radius:5px;" onclick="add_non_numeric(1)">1</div>
                                        </div>
                                        <div class="col-md-4" style="padding:0px;">
                                          <div class="calc_button"  onclick="add_non_numeric(2)">2</div>
                                        </div>
                                        <div class="col-md-4" style="padding:0px;">
                                          <div class="calc_button" style="border-top-right-radius:5px;" onclick="add_non_numeric(3)">3</div>
                                        </div>
                                      </div>
                                      <div>
                                        <div class="col-md-4" style="padding:0px;">
                                          <div class="calc_button" onclick="add_non_numeric(4)">4</div>
                                        </div>
                                        <div class="col-md-4" style="padding:0px;">
                                          <div class="calc_button" onclick="add_non_numeric(5)">5</div>
                                        </div>
                                        <div class="col-md-4" style="padding:0px;">
                                          <div class="calc_button" onclick="add_non_numeric(6)">6</div>
                                        </div>
                                      </div>
                                      <div>
                                        <div class="col-md-4" style="padding:0px;">
                                          <div class="calc_button" onclick="add_non_numeric(7)">7</div>
                                        </div>
                                        <div class="col-md-4" style="padding:0px;">
                                          <div class="calc_button" onclick="add_non_numeric(8)">8</div>
                                        </div>
                                        <div class="col-md-4" style="padding:0px;">
                                          <div class="calc_button" onclick="add_non_numeric(9)">9</div>
                                        </div>
                                      </div>
                                      <div>
                                        <div class="col-md-4" style="padding:0px;">
                                          <div class="calc_button" style="border-bottom-left-radius:5px;" onclick="add_clear(0)">C</div>
                                        </div>
                                        <div class="col-md-4" style="padding:0px;">
                                          <div class="calc_button" onclick="add_non_numeric('0')">0</div>
                                        </div>
                                        <div class="col-md-4" style="padding:0px;">
                                          <div class="calc_button" style="border-bottom-right-radius:5px;">.</div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- on mobile -->
                                  <div class="row show-on-mobile320" style="margin-top:5px;">
                                      <div>
                                      <div class="col-xs-6" style="width:30px;margin-left:10px">
                                          <div class="calc_button_right" onclick="add_clear(50000)">C50</div>
                                      </div>
                                      <div class="col-xs-6" style="width:30px;margin-left:10px">
                                          <div class="calc_button_right" onclick="add_clear(100000)">C100</div>
                                      </div>
                                      <div class="col-xs-6" style="width:30px;margin-left:35px">
                                          <div class="calc_button_right" onclick="add_clear(150000)">C150</div>
                                      </div>
                                      <div class="col-xs-6" style="width:30px;margin-left:35px">
                                          <div class="calc_button_right" onclick="add_clear(200000)">C200</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row show-on-mobile320" style="margin-top:5px;">
                                    <div>
                                    <div class="col-xs-6" style="width:30px;margin-right:10px;margin-left:0px;padding:0;">
                                        <div class="calc_button_right" onclick="add_numeric(5000)">+5</div>
                                    </div>
                                    <div class="col-xs-6" style="width:30px;margin-left:10px">
                                        <div class="calc_button_right" onclick="add_numeric(10000)">+10</div>
                                    </div>
                                    <div class="col-xs-6" style="width:30px;margin-left:35px">
                                        <div class="calc_button_right" onclick="add_numeric(15000)">+15</div>
                                    </div>
                                    <div class="col-xs-6" style="width:30px;margin-left:35px">
                                        <div class="calc_button_right" onclick="add_numeric(20000)">+20</div>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="row show-on-mobile320" style="margin-top:5px;">
                                      <div class="col-xs-6" style="width:30px;margin-right:10px;margin-left:0px;padding:0;">
                                          <div class="calc_button" onclick="add_non_numeric(1)">1</div>
                                      </div>
                                      <div class="col-xs-6" style="width:30px;margin-left:10px">
                                          <div class="calc_button" onclick="add_non_numeric(2)">2</div>
                                      </div>
                                      <div class="col-xs-6" style="width:30px;margin-left:35px">
                                          <div class="calc_button" onclick="add_non_numeric(3)">3</div>
                                      </div>
                                      <div class="col-xs-6" style="width:30px;margin-left:35px">
                                          <div class="calc_button" onclick="add_non_numeric(4)">4</div>
                                      </div>
                                  </div>
                                  <div class="row show-on-mobile320" style="padding-top:2px;">
                                    <div class="col-xs-6" style="width:30px;margin-right:10px;margin-left:0px;padding:0;">
                                        <div class="calc_button" onclick="add_non_numeric(5)">5</div>
                                    </div>
                                    <div class="col-xs-6" style="width:30px;margin-left:10px">
                                        <div class="calc_button" onclick="add_non_numeric(6)">6</div>
                                    </div>
                                    <div class="col-xs-6" style="width:30px;margin-left:35px">
                                        <div class="calc_button" onclick="add_non_numeric(7)">7</div>
                                    </div>
                                    <div class="col-xs-6" style="width:30px;margin-left:35px">
                                        <div class="calc_button" onclick="add_non_numeric(8)">8 </div>
                                    </div>
                                  </div>
                                  <div class="row show-on-mobile320" style="padding-top:2px;">
                                    <div class="col-xs-6" style="width:30px;margin-right:10px;margin-left:0px;padding:0;">
                                      <div class="calc_buttons" onclick="add_clear(0)">C</div>
                                    </div>
                                    <div class="col-xs-6" style="width:30px;margin-left:10px">
                                      <div class="calc_button" onclick="add_non_numeric(2)">2</div>
                                    </div>
                                    <div class="col-xs-6" style="width:30px;margin-left:35px">
                                      <div class="calc_button" onclick="add_non_numeric('0')">0</div>
                                    </div>
                                    <div class="col-xs-6" style="width:30px;margin-left:35px">
                                      <div class="calc_button">.</div>
                                    </div>
                                  </div>
                                  <!-- 720 -->
                                  <div class="row show-on-mobile720">
                                    <div class="col-xs-5">
                                      <div class="row" style="margin-top:5px;padding-left:0px">
                                          <div>
                                          <div class="col-xs-6" style="width:30px;margin-right:0px;margin-left:0px;padding:0;">
                                              <div class="calc_button_right" onclick="add_clear(50000)">50</div>
                                          </div>
                                          <div class="col-xs-6" style="width:30px;margin-left:30px">
                                              <div class="calc_button_right" onclick="add_clear(100000)">100</div>
                                          </div>
                                          <div class="col-xs-6" style="width:30px;margin-left:45px">
                                              <div class="calc_button_right" onclick="add_clear(150000)">150</div>
                                          </div>
                                          <div class="col-xs-6" style="width:30px;margin-left:45px">
                                              <div class="calc_button_right" onclick="add_clear(200000)">200</div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-top:5px;">
                                        <div>
                                          <div class="col-xs-6" style="width:30px;margin-right:10px;margin-left:0px;padding:0;">
                                              <div class="calc_button_right" onclick="add_numeric(5000)">+5</div>
                                          </div>
                                          <div class="col-xs-6" style="width:30px;margin-left:20px">
                                              <div class="calc_button_right" onclick="add_numeric(10000)">+10</div>
                                          </div>
                                          <div class="col-xs-6" style="width:30px;margin-left:45px">
                                              <div class="calc_button_right" onclick="add_numeric(15000)">+15</div>
                                          </div>
                                          <div class="col-xs-6" style="width:30px;margin-left:45px">
                                              <div class="calc_button_right" onclick="add_numeric(20000)">+20</div>
                                          </div>
                                        </div>
                                      </div>
                                      </div>
                                      <div class="col-xs-7" style="padding-left:50px">
                                      <div class="row" style="margin-top:5px;">
                                          <div class="col-xs-6" style="width:30px;margin-right:10px;margin-left:0px;padding:0;">
                                              <div class="calc_button" onclick="add_non_numeric(1)">1</div>
                                          </div>
                                          <div class="col-xs-6" style="width:30px;margin-left:10px">
                                              <div class="calc_button" onclick="add_non_numeric(2)">2</div>
                                          </div>
                                          <div class="col-xs-6" style="width:30px;margin-left:35px">
                                              <div class="calc_button" onclick="add_non_numeric(3)">3</div>
                                          </div>
                                          <div class="col-xs-6" style="width:30px;margin-left:35px">
                                              <div class="calc_button" onclick="add_non_numeric(4)">4</div>
                                          </div>
                                      </div>
                                      <div class="row" style="padding-top:2px;">
                                        <div class="col-xs-6" style="width:30px;margin-right:10px;margin-left:0px;padding:0;">
                                            <div class="calc_button" onclick="add_non_numeric(5)">5</div>
                                        </div>
                                        <div class="col-xs-6" style="width:30px;margin-left:10px">
                                            <div class="calc_button" onclick="add_non_numeric(6)">6</div>
                                        </div>
                                        <div class="col-xs-6" style="width:30px;margin-left:35px">
                                            <div class="calc_button" onclick="add_non_numeric(7)">7</div>
                                        </div>
                                        <div class="col-xs-6" style="width:30px;margin-left:35px">
                                            <div class="calc_button" onclick="add_non_numeric(8)">8 </div>
                                        </div>
                                      </div>
                                      <div class="row" style="padding-top:2px;">
                                        <div class="col-xs-6" style="width:30px;margin-right:10px;margin-left:0px;padding:0;">
                                            <div class="calc_buttons " style="background-color: #D82827;" onclick="add_clear(0)">C</div>
                                        </div>
                                        <div class="col-xs-6" style="width:30px;margin-left:10px">
                                          <div class="calc_button" onclick="add_non_numeric(2)">2</div>
                                        </div>
                                        <div class="col-xs-6" style="width:30px;margin-left:35px">
                                          <div class="calc_button" onclick="add_non_numeric('0')">0</div>
                                        </div>
                                        <div class="col-xs-6" style="width:30px;margin-left:35px">
                                          <div class="calc_button">.</div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                  <!-- end of mobile -->
                                </div>
                              </div>
                              <div class="col-md-12" style="padding:0px;">
                              <div class="payment_group">
                                <table id="" class="" width="100%">
                                  <tbody>
                                  </tbody>
                                   <tfoot>
                                      <tr>
                                          <td colspan="2" width="50%">Grand Total </td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" style="text-align:right; font-size:20px;" ><?= number_format($totalkedua)?>
                                           <input required type="hidden" name="i_total" id="i_total" class="form-control" value="<?= ($totalkedua)?>" style="text-align:right; font-size:30px; height:50px;" readonly/>
                                          </td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <div id="diskon_member" style="display:none;">
                                            Diskon member
                                          </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" style="text-align:right; font-size:20px;" >
                                          <div id="diskon_memberval" style="display:none;">
                                            <?= number_format($tot2)?>
                                               <input required type="hidden" name="i_disk2" id="i_disk2" class="form-control" value="<?= $tot2?>" style="text-align:right; font-size:30px; height:50px;" readonly/>
                                          </div>
                                        </td>
                                      </tr>
                                      <tr>
                                      </tr>
                                      <?php /*
                                      <tr><td>Diskon nominal</td></tr>
                                      <tr>
                                        <td colspan="3" style="text-align:right; " >
                                           <input required type="text" name="i_disc_nominal" id="i_disc_nominal" class="form-control" style="text-align:right; font-size:20px;" value="0" onChange="update_discount()"/>
                                        </td>
                                      </tr>
                                      */ ?>
                                      <tr>
                                      <tr>
                                          <td colspan="2">Diskon </td>
                                      </tr>
                                      <tr>
                                          <td colspan="3" style="text-align:right;">
                  												 <select required type="text" name="i_discount" id="i_discount" class="form-control" value="0" style="text-align:right; font-size:20px;" onChange="update_discount()">
                  												 <option value="0"></option>
                  												 <option value="5">5%</option>
                  												 <option value="10">10%</option>
                  												 <option value="15">15%</option>
                  												 <option value="20">20%</option>
                  												 <option value="25">25%</option>
                  												 <option value="30">30%</option>
                  												 </select>
                                         </td>
                                      </tr>
                                      <tr></tr>
                                          <td colspan="2">Sisa </td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" style="text-align:right; " >
                                           <input required type="text" name="i_grand_total" id="i_grand_total" class="form-control" value="<?= $totalkedua?>" style="text-align:right; font-size:20px;" readonly/>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" style="text-align:right; " >
                                        </td>
                                      </tr>
                                       <tr>
                                          <td colspan="2">Kembalian </td>
                                      </tr>
                                      <tr>
                                         <td colspan="3" style="text-align:right; " >
                                           <input required type="text" name="i_change" id="i_change" class="form-control" value="0" style="text-align:right; font-size:20px;" readonly/>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td colspan="5" style="font-size:36px;">
                                          </td>
                                      </tr>
                                  </tfoot>
                                </table>
                              </div>
                                <table width="100%">
                                   <tr>
                                    <td colspan="5">
                                      <button type="submit" class="btn button_save_payment btn-block">
                                        <i class="fa fa-save"></i> Simpan
                                      </button>
                                     </td>
                                      <td colspan="5" align="right">
                                        <a href="order.php?page=list&member=<?=$row_item['member_id']?>&id=<?=$_GET['id']?>&branch_id=<?=$_GET['branch_id']?>&ruangan_id=<?=$_GET['ruangan_id']?>&t=<?=$_GET['t']?>" class="btn button_close_payment">
                                          <i class="fa fa-times-circle"></i> close
                                        </a>
                                     </td>
                                   </tr>
                                </table>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4" style="padding-left:5px;padding-right: 5px;">
                              <div class="payment_group">
                                <div class="struk_frame">
                                  <div class="struk_title">
                                    <b>ZEE HOLISTIC</b>
                                    
                                  </div>
                                <table width="100%">
                                  <tr>
                                    <td></td>
                                    <td width="50%"><?= $table_name ?></td>
                                    <td></td>
                                    <td width="20%">Date :</td>
                                    <td width="50%"><?= date("d/m/Y"); ?></td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td width="50%"><?= $building_name ?></td>
                                    <td></td>
                                    <td>Time :</td>
                                    <td width="50%"><?= date("H:i:s"); ?></td>
                                  </tr>
                                </table>
                                <div style="border-bottom:1px #000 dotted; padding-bottom:5px; margin-bottom:5px;"></div>
                                 <table id="" class="" width="100%">
                                    <tbody>
                                        <tr>
                                          <td width="10%" valign="top">1</td>
                                          <td valign="top"><?= $row_item['pijat_name'] ?></td>
                                          <td align="right" valign="top"><?= number_format($row_item['pijat_harga']) ?></td>
                                        </tr>

                                           <?php 
                                           $tjual = 0;
                                           $no = 2;
                                           $qtemp = mysql_query("SELECT d.`transaction_detail_id`, i.* 
          FROM `transaction_tmp_details` d 
LEFT JOIN item i ON i.`item_id` = d.`transaction_detail_item_qty`
WHERE d.transaction_id = '".$_GET['id']."' AND d.transaction_detail_status = 0");
        while ($dtemp = mysql_fetch_array($qtemp)) {
          ?>
                                           <tr>
                                          <td width="10%" valign="top"><?=$no?></td>
                                          <td valign="top"><?=$dtemp['item_name']?></td>
                                          <td align="right" valign="top"><?php print number_format($dtemp['item_harga_jual']); ?></td>
                                        </tr>
                                        <?php $tjual += $dtemp['item_harga_jual'];  $no++; } ?>
                                    </tbody>
                                  </table>
                                  <?php 
                                  $total_price = $tjual + $row_item['pijat_harga'];
                                  $sc = $total_price * 0.05;
                                  $tax = $total_price * 0.1;
                                  $totalkedua = $total_price + $sc + $tax;
                                  ?>
                                  <div style="border-bottom:1px #000 dotted; padding-bottom:5px; margin-bottom:5px;"></div>
                                    <table width="100%">
                                     <tfoot>
                                        <tr>
                                            <td colspan="2" >Total </td>
                                            <td colspan="3" style="text-align:right;" ><?= number_format($total_price)?>
                                             </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" >Service Charge(5%) </td>
                                            <td colspan="3" style="text-align:right;" ><?= number_format($sc)?>
                                             </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" >Tax(10%) </td>
                                            <td colspan="3" style="text-align:right;" ><?= number_format($tax)?>
                                             </td>
                                        </tr>
  								                      <tr>
                                            <td colspan="2" style="font-size:20px;">Grand Total </td>
                                            <td colspan="3" style="text-align:right; font-size:20px;" ><span id="totalkedua"><?= number_format($totalkedua)?></span></td>
                                        </tr>
                                        <?php /*
                                        <tr>
                                          <td colspan="5"><a href="print_bill.php?table_id=<?=$_GET['table_id']?>&branch_id=<?=$_GET['branch_id']?>&ruangan_id=<?=$_GET['ruangan_id']?>&ruangan_infrastruktur_id=<?=$_GET['ruangan_infrastruktur_id']?>&id=<?=$_GET['id']?>&t=<?=$_GET['t']?>" target="_blank" class="btn button_save_payment btn-block"><i class="fa fa-print"></i>Print Bill</a> </td>
                                        </tr>
                                        */ ?>
                                    </tfoot>
                                  </table>
			                          </div>
                              </div>
                          </form>
                          </div><!-- /.box-body -->
                        </div>
                      </div><!-- /.box -->
                  </div>
                  <div class="col-md-3">
                    <div class="payment_widget_frame">
                      <div class="payment_widget_header" style="background-color: #361563">
                        <div style="margin-bottom:10px; font-size:20px;"><?= "Table ". $table_name ?></div>
                        <div><?php //= $transaction_code ?></div>
                      </div>
                      <div class="payment_widget_content">
                        <!-- <div class="form-group">
                          <div class="row">
                            <div class="col-md-6" style="padding:0px">
                              <a href="" class="btn payment_widget_button">Navigasi</a>
                            </div>
                            <div class="col-md-6"  style="padding-right:0px">
                              <a href="" class="btn payment_widget_button">Info</a>
                            </div>
                          </div>
                        </div> -->
                        <!-- <div class="row">
                          <div class="form-group">
                           <a href="" class="btn payment_widget_button">Split Bill</a>
                          </div>
                        </div> -->
                        <!-- <div class="row">
                          <div class="form-group">
                           <a href="" class="btn payment_widget_button">Laporan</a>
                          </div>
                        </div> -->
                        <div class="row">
                          <div class="form-group">
                           <a href="order.php?building_id=<?= $building_id?>" class="btn payment_widget_button">Daftar Transaksi</a>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                           <a href="reserved.php" class="btn payment_widget_button">Reservasi</a>
                          </div>
                        </div>
                        <!-- <div class="form-group">
                          <div class="row">
                            <div class="col-md-6" style="padding:0px">
                              <a href="" class="btn payment_widget_button">About</a>
                            </div>
                            <div class="col-md-6"  style="padding-right:0px">
                              <a href="" class="btn payment_widget_button">Setting</a>
                            </div>
                          </div>
                        </div> -->
                        <div class="row">
                          <div class="form-group">
                           <a href="logout.php" class="btn payment_widget_button">Logout</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </section><!-- /.content -->
    </body>
</html>
 <!-- page script -->
 <!-- <script type="text/javascript">
   $(document).each(function(){
       $(this).keyup(function(){
         var grand_total = $(i_grand_total).val();
         var disc_nominal = $(i_disc_nominal).val();
         grand_total = $.isNumeric(grand_total)?grand_total:0;
         $("#i_change").val(parseInt(grand_total)-parseInt(disc_nominal));
       })
     });
 </script> -->
 <!-- page script -->
 <script type="text/javascript">

 </script>
        <script type="text/javascript">
            $(function() {

				window.methodpembayaran = 1;
               window.numberWithCommas = function(x) {
					return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				}
 				$('#example_simple').dataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": false,
                    "bInfo": false,
                    "bAutoWidth": false
                });
            });
		        function get_change(id){
                    var color = "#d82827";
                  $(".i_span").css("background-color", color);

                  document.getElementById("i_span_"+id).style.backgroundColor = "#ccc";
                }

    function update_discount(){
		  //  var tax = <?php //echo $tax?>;
		// var charge = <?php //echo $svc?>;
       var total = parseFloat(<?= $totalkedua ?>);
       var discountvalue = parseFloat(document.getElementById("i_discount").value);
       var discount = discountvalue/100*total;
       var disc_nominal = parseFloat(document.getElementById("i_disc_nominal").value);
       
       //var diskon_member_value = parseFloat(document.getElementById("i_diskon_member").value);
        if(discount > total){
         alert("Discount tidak boleh melebihi total harga");
         document.getElementById("i_discount").value = 0;
         document.getElementById("i_grand_total").value = total;
         }else{
        var grand_total = total - discount - disc_nominal;
		$.ajax({
		  method: "POST",
		  url: "payment.php?page=hitungbulat",
		  data: { price: grand_total}
		}).done(function( msg ) {
			document.getElementById("i_grand_total").value = Math.round(msg);
			if(window.methodpembayaran != 1){
				document.getElementById("i_payment").value = Math.round(msg);
                                
			}
			update_change(msg);
		  });
       }
      }
      function update_change(a = 0){
        var bayar = parseFloat($("#i_payment").val());
		if(a == 0){
			var total = parseFloat($("#i_grand_total").val());
		}else{
			var total = a;
		}
        if(bayar < total ){
          alert("Pembayaran tidak boleh lebih kecil dari Total Pembelian");
          kembali = 0;
        }else{

          kembali = bayar - total;
        }
        $("#i_change").val(kembali);
      }
      function getCombo(selectObject) {
        var value = selectObject.value;
        alert(value);
      }
      function payment_method(id){
		window.methodpembayaran = id;
        var bank_frame = document.getElementById("bank_frame");
        var voucher_frame = document.getElementById("voucher_frame");
        if(id == 1){
          bank_frame.style.display = 'none';
          voucher_frame.style.display = 'none';
        }else if(id==2 || id==3){
          bank_frame.style.display = 'table';
          voucher_frame.style.display = 'none';
        }else{
          bank_frame.style.display = 'none';
          voucher_frame.style.display = 'table';
       }
      }
      function add_non_numeric(data){

         var bayar = parseFloat(document.getElementById("i_payment").value);
          if(bayar){
            bayar = bayar;
          }else{
            bayar = '';
          }
         document.getElementById("i_payment").value = bayar.toString() + data.toString();
         update_change();
      }

      function add_numeric(data){

         var bayar = parseFloat(document.getElementById("i_payment").value);
          if(bayar){
            bayar = bayar;
          }else{
            bayar = '';
          }
         document.getElementById("i_payment").value = bayar + data;
         update_change();
      }


      function add_clear(data){

         document.getElementById("i_payment").value = data;
        update_change();
      }

      function update_voucher(id){
        //alert(data);
        $.ajax({
          type: 'POST',
          url: 'payment.php?page=read_voucher',
          data: {id:id},
          dataType: 'json',
          success: function(data){

            var type = data.voucher_type_id;
            var value_voucher = data.voucher_value;
            var total = parseFloat(document.getElementById("i_grand_total").value);

            if(type == 1){
              document.getElementById("i_discount").value = value_voucher;
            }else{
              var grand = value_voucher / 100 * total;
              document.getElementById("i_discount").value = grand;
            }

            update_discount();
             //$('#i_discount').value(1000000);
          }
        });
      }
      $(document).ready(function() {
          $(".selectpicker").selectpicker();
        });
        </script>
        <script>
          function tax(){
            if(tax_frame.style.display=='none'){
              tax_frame.style.display = 'table';
            }else {
              tax_frame.style.display = 'none';
            }
          }

          function tax_value(){
            var tax_v       = parseFloat(document.getElementById("i_tax_v").value);
            var i_payment   = parseFloat(document.getElementById("i_payment").value);
            var grand_total = document.getElementById("i_grand_total");


              var tax_from_total = tax_v / 100 * i_payment;
              var grand_total = i_payment+tax_from_total;

              document.getElementById("i_grand_total").value = grand_total;
            // alert('test');
          }
          var i = document.getElementById("i_member").value;
          var j = document.getElementById("diskon_member");
          var k = document.getElementById("i_member_v");
          var l = document.getElementById("diskon_memberval");
          if(i!=0)
          {
            k.style.display='block';
            j.style.display='block';
            l.style.display='block';
          }else {
            k.style.display='none';
            // k.style.display='none';
          }

        </script>
