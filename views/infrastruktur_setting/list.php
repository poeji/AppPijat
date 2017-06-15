<?php
if(!$_SESSION['login']){
header("location: ../login.php");
}
?>
<!doctype html>
  <html lang="en">
    <head>
      <title><?php echo $title2; ?></title>
      <!-- bootstrap 3.0.2 -->
      <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />

      <!-- DATA TABLES -->
      <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
      <!-- Theme style -->
      <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
      <!-- iCheck for checkboxes and radio inputs -->
      <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />

      <link rel="stylesheet" type="text/css" href="../css/style_table.css" />
      <!-- tooltip -->
      <link rel="stylesheet" type="text/css" href="../css/tooltip/tooltip-classic.css" />
      <!-- button component-->
      <link rel="stylesheet" type="text/css" href="../css/button_component/normalize.css" />
      <link rel="stylesheet" type="text/css" href="../css/button_component/demo.css" />
      <link rel="stylesheet" type="text/css" href="../css/button_component/component.css" />
      <link rel="stylesheet" type="text/css" href="../css/button_component/content.css" />
      <link rel="stylesheet" type="text/css" href="../css/lookup/bootstrap-select.css">

      <link rel="stylesheet" href="../css/vertical_scroll_new/style.css">

      <link rel="stylesheet" href="../css/vertical_scroll_new/jquery.mCustomScrollbar.css">

      <link rel="stylesheet" href="../assets/jquery-ui-1.12.1/jquery-ui.min.css">

      <script src="../js/button_component/modernizr.custom.js"></script>
      <!-- <script type="text/javascript" src="../js/table/jquery.js"></script> -->
      <script type="text/javascript" src="../assets/jquery-3.min.js"></script>

      <script src="../js/bootstrap.min.js" type="text/javascript"></script>

      <script src="../assets/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>

      <style media="screen">
      .modal-backdrop {
          position: fixed;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          z-index: 1000;
          background-color: #000;
      }
      section {
        /*padding: 2em;*/
        text-align: justify;
        width: 100%;
        margin: 0;
        clear: both;
      }
      <?php while ($r_infrastruktur__ = mysql_fetch_array($q_infrastruktur__)) {?>

      #theImg_<?= $r_infrastruktur__['ruangan_infrastruktur_id']?> {
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
      <?php } ?>
      /*.infrastruktur_box {
        padding: 2em;
        text-align: justify;
        max-width: 1300px;
        margin: 0 auto;
        clear: both;
      }*/
      </style>
    </head>
    <body margin-left="0" margin-top="0">
      <div class="header_fixed">
        <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
          <button class="blue_color_button"  type="button">ADD ROOM</button>
        </div><!-- morph-button -->
        <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
          <button type="button" class="blue_color_button" onclick="popmodal_add_infrastruktur()">ADD</button>
        </div><!-- morph-button -->
        <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
          <button type="button" class="blue_color_button"   onClick="hapus_infrastruktur()">HAPUS</button>
        </div><!-- morph-button -->
        <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
          <button type="button" class="red_color_button"   onClick="javascript: window.location.href = 'home.php'; ">BACK TO MENU</button>
        </div><!-- morph-button -->
      </div>
      <section id="ruangan_box" >
        <div class="box" style="z-index:2;">
          <!-- <div name="ruangan_box" class="infrastruktur_box"  style="background-color:rgba(255, 255, 255, 0.85);height:100vh;"> -->
            <?php while ($r_infrastruktur_ = mysql_fetch_array($q_infrastruktur_)) {
              $where_infrastruktur_id = "WHERE infrastruktur_id = '".$r_infrastruktur_['infrastruktur']."'";
              $img = select_config_by('infrastruktur','infrastruktur_img', $where_infrastruktur_id);?>
              <!-- <label for=""><?= $r_infrastruktur_['infrastruktur_name']?></label> -->
              <img id="theImg_<?= $r_infrastruktur_['ruangan_infrastruktur_id']?>" src="../img/infrastruktur/<?= $img?>" alt="">
            <?} ?>
            <input type="hidden" name="ruangan_id" id="ruangan_id" value="<?= $ruangan_id?>">
          <!-- </div> -->
        </div>
        <input type="hidden" name="ruangan_id" id="ruangan_id" value="<?= $ruangan_id?>">
      </section>
      <div class="footer_fixed">
        <div class="morph-button morph-button-sidebar morph-button-fixed">
          <button type="button" class="green_color_button"><?= $building_name?></button>
          <div class="morph-content">
            <div>
              <div class="content-style-sidebar">
                <span class="icon icon-close">Close the overlay</span>
                <h2>Room</h2>
                <ul>
                <?php
                $q_building5 = mysql_query("select * from buildings order by building_id");
                while($r_building5 = mysql_fetch_array($q_building5)){ ?>
                  <li>
                    <a href="table.php?building_id=<?= $r_building5['building_id']?>"><?= $r_building5['building_name']?></a>
                  </li>
                <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="medium_modal" class="modal fade" tabindex="-1" role="dialog" style="z-index:1002">
        <div class="modal-dialog" role="document">
          <div id="medium_modal_content" class="modal-content"  style="border-radius:0;">

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </body>
  </html>
<script type="text/javascript" src="../js/lookup/bootstrap-select.js"></script>

<script type="text/javascript">
  function popmodal_add_infrastruktur(){
    var ruangan_id = $('#ruangan_id').val();
    $('#medium_modal').modal();
    var url = 'infrastruktur_setting.php?page=popmodal_add_infrastruktur&ruangan_id='+ruangan_id;
      $('#medium_modal_content').load(url,function(result){});
  }

  $(function() {
    <?php while($r_infrastruktur = mysql_fetch_array($q_infrastruktur)){?>
      // $('#theImg_<?= $r_infrastruktur['ruangan_infrastruktur_id']?>').draggable( {
      //   containment: '#ruangan_box',
      //   cursor: 'move',
      //   snap: '',
      //   stop: ''
      // } );

      $('#theImg_<?= $r_infrastruktur['ruangan_infrastruktur_id']?>').draggable({
          stack: "#ruangan_box",
          stop: function(event, ui) {
              var position = this.getBoundingClientRect();
              var pos_x = position.left;
              var pos_y = position.top;
              var need = ui.helper.data("need");

              console.log(pos_x);
              console.log(pos_y);
              console.log(<?= $r_infrastruktur['ruangan_infrastruktur_id']?>);

              //Do the ajax call to the server
              $.ajax({
                  type: "POST",
                  url: "infrastruktur_setting.php?page=save_infrastruktur_location",
                  data: { x: pos_x, y: pos_y, ruangan_infrastruktur_id: <?= $r_infrastruktur['ruangan_infrastruktur_id']?>}
                }).done(function( msg ) {
                  // alert( "Data Saved: " + msg  );
                });
        }
      });

      // alert();
    <?} ?>
  });

function hapus_infrastruktur(){
  var ruangan_id = $('#ruangan_id').val();
  $('#medium_modal').modal();
  var url = 'infrastruktur_setting.php?page=popmodal_hapus_infrastruktur&ruangan_id='+ruangan_id;
    $('#medium_modal_content').load(url,function(result){});
}

</script>
