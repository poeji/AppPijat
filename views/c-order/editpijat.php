<?php
if(!$_SESSION['login']){
    header("location: ../login.php");
}

if(isset($_GET['date'])){
    $date = format_date($_GET['date']);
} else {
  $date = format_date(date("Y-m-d"));
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
                    format: 'dd/mm/yyyy'
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
    <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
      <button class="blue_color_button"  type="button"  onClick="javascript: window.location.href = 'c-order.php?page=payment&member=<?=$_GET['member']?>&id=<?=$_GET['id']?>'; "><i class="fa fa-bars show-on-mobile"></i>
      <span class="hide-on-mobile">BACK TO PAYMENT</span>
      </button>BACK TO PAYMENT</button>
    </div><!-- morph-button -->
    <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
      <button class="blue_color_button"  type="button"  onClick="javascript: window.location.href = 'c-order.php?page=dashboard'; "><i class="fa fa-bars show-on-mobile"></i>
      <span class="hide-on-mobile">DASHBOARD</span>
      </button>DASHBOARD</button>
    </div><!-- morph-button -->
  </div>
  <br>

  <section>
    <div class="box">
      <div id="ruangan_box" name="ruangan_box" class="box-body" style="background-color:rgba(255, 255, 255, 0.85);height:100vh;">
            <br><br>
            <?php
                                            $q_member = mysql_query("select * from members where member_id = '$_GET[member]'");
                                            $row_member = mysql_fetch_array($q_member);
                                          ?>
                                          <div class="col-md-12">
                                          <div><label>Nama    : <?= $row_member['member_name'] ?></label></div>
                                          <div><label>Alamat  : <?= $row_member['member_alamat'] ?></label></div>
                                          <div><label>Telepon : <?= $row_member['member_phone'] ?></label></div>
                                          <div><label>Email : <?= $row_member['member_email'] ?></label></div>
                                          </div>
            
            <input type="hidden" name="page" value="additem">
            
            <div class="col-md-12">
                    <div class="panel panel-default panel-item">
                    <table class="table my-item">
                      <thead>
                        <tr style="background-color: #9975A1">
                          <th class="text-center" style="width:5%;">No</th>
                          <th width="15%">PIJAT NAME</th>
                          <th width="15%">QTY</th>
                          <th width="15%">HARGA</th>
                          <th width="15%">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      /*$no = 1;
                        $qkursi = mysql_query("SELECT t.`pijat`, p.`pijat_name`, p.`pijat_harga`, p.pijat_id FROM `transactions_tmp` t
LEFT JOIN pijat p ON p.`pijat_id` = t.`pijat`
WHERE t.`transaction_id` = '$_GET[id]'");
                        while($dkursi = mysql_fetch_array($qkursi)) {
                      ?>
                      <tr>
                      <td class="text-center"><?=$no?></td>
                      <td><?=$dkursi['pijat_name']?></td>
                      <td>1</td>
                      <td><?=number_format($dkursi['pijat_harga'])?></td>
                      <td ><a href="c-order.php?page=editpijat&member=<?=$_GET['member']?>&id=<?=$_GET['id']?>&pijat_id=<?=$dkursi['pijat_id']?>&type=1" title="Edit Pijat <?=$dkursi['pijat_name']?>"><i class="fa fa-fw fa-edit"></i></a></td> 
                      </tr>
                      <?php $no++; } */ ?>

                      <?php 
                      $no = 1;
                        $qpjt = mysql_query("SELECT t.`transaction_pijat_id`, p.`pijat_id`, p.`pijat_name`, p.`pijat_harga` FROM `transaction_pijat` t
LEFT JOIN pijat p ON p.`pijat_id` = t.`pijat_id`
WHERE t.`transaction_id` = '$_GET[id]' AND t.status_pijat = 0");
                        while($dpjt = mysql_fetch_array($qpjt)) {
                      ?>
                      <tr>
                      <td class="text-center"><?=$no++?></td>
                      <td><?=$dpjt['pijat_name']?></td>
                      <td>1</td>
                      <td><?=number_format($dpjt['pijat_harga'])?></td>
                      <td ><a href="c-order.php?page=editpijat&member=<?=$_GET['member']?>&id=<?=$_GET['id']?>&pijat_id=<?=$dpjt['pijat_id']?>&type=2&tid=<?=$dpjt['transaction_pijat_id']?>" title="Edit Pijat <?=$dpjt['pijat_name']?>"><i class="fa fa-fw fa-edit"></i></a></td> 
                      </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
              
              <hr>
              <br>
            <?php if(isset($_GET['type']) && $_GET['type'] != "") { ?>
                <br><br>
                <form action="c-order.php?page=saveeditpijat" method="POST">
                <input type="hidden" name="page" value="saveeditpijat">
                <input type="hidden" name="type" value="<?=$_GET['type']?>">
                <input type="hidden" name="member" value="<?=$_GET['member']?>">
                <?php if($_GET['type']==1) { ?>
                  <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <?php } else { ?>
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                  <input type="hidden" name="tid" value="<?=$_GET['tid']?>">
                <?php } ?>
                <div class="col-md-12">
                  
                  <div class="col-md-1">
                    Edit Pijat :
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <select id="pijat_id" name="pijat_id" size="1"
                      class="selectpicker show-tick form-control" data-live-search="true" required>
                              <?php
                              $q_member = mysql_query("SELECT * FROM `pijat` ORDER BY pijat_name ASC");
                              while($r_member = mysql_fetch_array($q_member)){
                              ?>
                             <option <?php if($r_member['pijat_id']==$_GET['pijat_id']) { ?> selected="selected" <?php } ?> value="<?= $r_member['pijat_id'] ?>" >
                    <?= $r_member['pijat_name']?>
                  </option>
                              <?php
                              }
                              ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                  <label for="">&nbsp;</label>
                    <input type="submit" name="submit" value="Edit Pijat" class="btn btn-danger">
                  </div>
                  </form>
            <?php } ?>
              
              
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
