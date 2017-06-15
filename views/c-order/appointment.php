<?php
if(!$_SESSION['login']){
    header("location: ../login.php");
}

if(isset($_POST['date'])){
    $date = $_POST['date'];
} else {
    $date = date("Y-m-d");
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
    
    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../views/c-order/datepicker3.css">

  <script src="../views/c-order/bootstrap-timepicker.min.js"></script>

  <!-- Bootstrap time Picker -->
        <link href="../css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
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

<script type="text/javascript">
$(document).ready(function() {
    $('.datepicker').datepicker({ format: "dd/mm/yyyy" });

    //date picker
                $('#date_picker1').datepicker({
                    format: 'yyyy-mm-dd'
                });

}); 
</script>
<script type="text/javascript">
$(document).ready(function() {
  
  //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });

}); 
</script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#i_pijat").change(function(){
    var pijat_id = $("#i_pijat").val();
    $.ajax({
        url: "../views/c-order/getdata.php",
        data: "proses=addpijat&pijat_id="+pijat_id,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#paketitem").html(msg);
        }
    });
  });
});
  </script>
</head>
<body margin-left="0" margin-top="0">
  <div class="header_fixed">
    <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
      <button class="blue_color_button"  type="button"  onClick="javascript: window.location.href = 'home.php'; "><i class="fa fa-bars show-on-mobile"></i>
      <span class="hide-on-mobile">BACK TO MENU</span>
      </button>BACK TO MENU</button>
    </div><!-- morph-button -->
    <!-- <div class="logo_order"></div> -->
    <?php /*
    <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
      <button class="blue_color_button"  type="button"  onClick="javascript: window.location.href = 'c-order.php?page=payment&member=<?=$_GET['member']?>&id=<?=$_GET['id']?>'; "><i class="fa fa-bars show-on-mobile"></i>
      <span class="hide-on-mobile">BACK TO PAYMENT</span>
      </button>BACK TO PAYMENT</button>
    </div><!-- morph-button -->
    */ ?>
    <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
      <button class="blue_color_button"  type="button"  onClick="javascript: window.location.href = 'c-order.php?page=dashboard'; "><i class="fa fa-bars show-on-mobile"></i>
      <span class="hide-on-mobile">DASHBOARD</span>
      </button>DASHBOARD</button>
    </div><!-- morph-button -->
  </div>
  <br>

  <section>
    <div class="box">
      <div id="ruangan_box" name="ruangan_box" class="box-body" style="background-color:rgba(255, 255, 255, 0.85);height:115vh;">
            <br><br>
            
            <form action="c-order.php?page=appointment" method="POST">
            <input type="hidden" name="page" value="additem">
            <div class="col-md-3">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" required class="form-control pull-right normal date_picker1"
                    id="date_picker1" name="date" value="<?= $date ?>"/>
                  </div><!-- /.input group -->
                </div>
              </div>
              <div class="col-md-2">
              <label for="">&nbsp;</label>
                <input type="submit" name="submit" value="Cek Appointment" class="btn btn-danger">
              </div>
            </form>
            
            <div class="col-md-12">
                    <div class="panel panel-default panel-item">
                    <table class="table my-item">
                      <thead>
                        <tr style="background-color: #9975A1">
                          <th class="text-center" style="width:5%;">#</th>
                          <?php 
                          $qruangan = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                          $truangan = mysql_num_rows($qruangan);
                          while ($druangan = mysql_fetch_array($qruangan)) {
                          ?>
                          <th width="15%"><?=$druangan['ruangan_name']?></th>
                          <?php  
                          }
                          ?>                         
                        </tr>
                      </thead>
                      <tbody>


                      <tr>
                        <td class="text-center">09:00</td>
                        <?php 
                        $qruangan09 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan09 = mysql_fetch_array($qruangan09)) {

                        //cek user                        
                        $qcusr09 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 09:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 09:59' AND k.`ruangan_id` = $druangan09[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr09 = mysql_fetch_array($qcusr09)) {
                            echo "<strong>".$dusr09['member_name']." [".$dusr09['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr>

                     <tr>
                        <td class="text-center">10:00</td>
                        <?php 
                        $qruangan10 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan10 = mysql_fetch_array($qruangan10)) {

                        //cek user                        
                        $qcusr10 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 10:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 10:59' AND k.`ruangan_id` = $druangan10[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr10 = mysql_fetch_array($qcusr10)) {
                            echo "<strong>".$dusr10['member_name']." [".$dusr10['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td class="text-center">11:00</td>
                        <?php 
                        $qruangan11 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan11 = mysql_fetch_array($qruangan11)) {

                        //cek user                        
                        $qcusr11 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 11:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 11:59' AND k.`ruangan_id` = $druangan11[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr11 = mysql_fetch_array($qcusr11)) {
                            echo "<strong>".$dusr11['member_name']." [".$dusr11['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td class="text-center">12:00</td>
                        <?php 
                        $qruangan12 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan12 = mysql_fetch_array($qruangan12)) {

                        //cek user                        
                        $qcusr12 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 12:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 12:59' AND k.`ruangan_id` = $druangan12[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr12 = mysql_fetch_array($qcusr12)) {
                            echo "<strong>".$dusr12['member_name']." [".$dusr12['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td class="text-center">13:00</td>
                        <?php 
                        $qruangan13 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan13 = mysql_fetch_array($qruangan13)) {

                        //cek user                        
                        $qcusr13 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 13:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 13:59' AND k.`ruangan_id` = $druangan13[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr13 = mysql_fetch_array($qcusr13)) {
                            echo "<strong>".$dusr13['member_name']." [".$dusr13['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td class="text-center">14:00</td>
                        <?php 
                        $qruangan14 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan14 = mysql_fetch_array($qruangan14)) {

                        //cek user                        
                        $qcusr14 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 14:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 14:59' AND k.`ruangan_id` = $druangan14[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr14 = mysql_fetch_array($qcusr14)) {
                            echo "<strong>".$dusr14['member_name']." [".$dusr14['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr><tr>
                        <td class="text-center">15:00</td>
                        <?php 
                        $qruangan15 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan15 = mysql_fetch_array($qruangan15)) {

                        //cek user                        
                        $qcusr15 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 15:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 15:59' AND k.`ruangan_id` = $druangan15[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr15 = mysql_fetch_array($qcusr15)) {
                            echo "<strong>".$dusr15['member_name']." [".$dusr15['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td class="text-center">16:00</td>
                        <?php 
                        $qruangan16 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan16 = mysql_fetch_array($qruangan16)) {

                        //cek user                        
                        $qcusr16 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 16:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 16:59' AND k.`ruangan_id` = $druangan16[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr16 = mysql_fetch_array($qcusr16)) {
                            echo "<strong>".$dusr16['member_name']." [".$dusr16['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td class="text-center">17:00</td>
                        <?php 
                        $qruangan17 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan17 = mysql_fetch_array($qruangan17)) {

                        //cek user                        
                        $qcusr17 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 17:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 17:59' AND k.`ruangan_id` = $druangan17[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr17 = mysql_fetch_array($qcusr17)) {
                            echo "<strong>".$dusr17['member_name']." [".$dusr17['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td class="text-center">18:00</td>
                        <?php 
                        $qruangan18 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan18 = mysql_fetch_array($qruangan18)) {

                        //cek user                        
                        $qcusr18 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 18:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 18:59' AND k.`ruangan_id` = $druangan18[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr18 = mysql_fetch_array($qcusr18)) {
                            echo "<strong>".$dusr18['member_name']." [".$dusr18['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td class="text-center">19:00</td>
                        <?php 
                        $qruangan19 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan19 = mysql_fetch_array($qruangan19)) {

                        //cek user                        
                        $qcusr19 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 19:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 19:59' AND k.`ruangan_id` = $druangan19[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr19 = mysql_fetch_array($qcusr19)) {
                            echo "<strong>".$dusr19['member_name']." [".$dusr19['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td class="text-center">20:00</td>
                        <?php 
                        $qruangan20 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan20 = mysql_fetch_array($qruangan20)) {

                        //cek user                        
                        $qcusr20 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 20:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 20:59' AND k.`ruangan_id` = $druangan20[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr20 = mysql_fetch_array($qcusr20)) {
                            echo "<strong>".$dusr20['member_name']." [".$dusr20['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr>

                       <tr>
                        <td class="text-center">21:00</td>
                        <?php 
                        $qruangan21 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan21 = mysql_fetch_array($qruangan21)) {

                        //cek user                        
                        $qcusr21 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 21:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 21:59' AND k.`ruangan_id` = $druangan21[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr21 = mysql_fetch_array($qcusr21)) {
                            echo "<strong>".$dusr21['member_name']." [".$dusr21['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td class="text-center">22:00</td>
                        <?php 
                        $qruangan22 = mysql_query("SELECT * FROM `ruangan` WHERE branch_id = $_SESSION[branch_id]  ORDER BY ruangan_name ASC");
                        while ($druangan22 = mysql_fetch_array($qruangan22)) {

                        //cek user                        
                        $qcusr22 = mysql_query("SELECT m.`member_name`, r.`infrastruktur_name` FROM `transaction_kursi` k
LEFT JOIN `members` m ON m.`member_id` = k.`member_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') >= '$date 22:00' AND DATE_FORMAT(datebook, '%Y-%m-%d %H:%i') <= '$date 22:59' AND k.`ruangan_id` = $druangan22[ruangan_id] AND k.status_kursi = 0");
                        ?>
                          <td>
                          <?php 
                          while ($dusr22 = mysql_fetch_array($qcusr22)) {
                            echo "<strong>".$dusr22['member_name']." [".$dusr22['infrastruktur_name']."], </strong>";
                          }
                          ?>
                            
                          </td>
                        <?php } ?>
                      </tr>

                     
                      

                      </tbody>
                    </table>


                  </div>

            
              
              
            </div>
          </div>
      </div>
    </div>
  









      </div>
    </div>
  </section>
  

   

     
    
     

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
  <!-- Datepicker -->
        <script src="../js/plugins/datepicker/bootstrap-datepicker.js"></script>
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
