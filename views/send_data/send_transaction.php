<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Send Data</title>
    <script src="../js/jquery.js"></script>
    <style media="screen">
      body {
        font-size: 20px;
      }
    </style>
    <script type="text/javascript">
    var url = 'http://bakmigili.com/services/C_trans/trans_tc';
    var url_2 = 'http://bakmigili.com/services/C_trans/trans_totalpengunjung';
    var url_3 = 'http://bakmigili.com/services/C_trans/trans_totalpenjualan2';
    var url_4 = 'http://bakmigili.com/services/C_trans/trans_totaltransaksi';
    var url_5 = 'http://bakmigili.com/services/C_trans/trans_totalperkepala';
    var url_6 = 'http://bakmigili.com/services/C_trans/trans_totalpenjualan';
    var url_7 = 'http://bakmigili.com/services/C_trans/trans_menu';
    var url_8 = 'http://bakmigili.com/services/C_trans/trans_totalpenjualanmatrixmargin';
    var url_9 = 'http://bakmigili.com/services/C_trans/trans_matrix';
    var url_10 = 'http://bakmigili.com/services/C_trans/trans_tmenu';
    var url_11 = 'http://bakmigili.com/services/C_trans/trans_matrix2';

    // var url     = '../../posreport/C_trans/trans_tc';
    // var url_2   = '../../posreport/C_trans/trans_totalpengunjung';
    // var url_3   = '../../posreport/C_trans/trans_totalpenjualan2';
    // var url_4   = '../../posreport/C_trans/trans_totaltransaksi';
    // var url_5   = '../../posreport/C_trans/trans_totalperkepala';
    // var url_6   = '../../posreport/C_trans/trans_totalpenjualan';
    // var url_7   = '../../posreport/C_trans/trans_menu';
    // var url_8   = '../../posreport/C_trans/trans_totalpenjualanmatrixmargin';
    // var url_9   = '../../posreport/C_trans/trans_matrix';
    // var url_10  = '../../posreport/C_trans/trans_tmenu';
    // var url_11  = '../../posreport/C_trans/trans_matrix2';
    </script>
  </head>
  <body>
    <label for="">Please Wait .. </label>
    <form id="trans_tc">
      <div class="">
        <input type="hidden" id="transaction_code" name="transaction_code" value="<?= $transaction_code?>">
        <input type="hidden" id="branch_id" name="branch_id" value="<?= $branch_id?>">
        <input type="hidden" id="transaction_date" name="transaction_date" value="<?= $transaction_date?>">
        <input type="hidden" id="jumlah" name="jumlah" value="1">
      </div>
    </form>
    <form id="trans_totalpengunjung">
      <input type="hidden" id="transaction_code" name="transaction_code" value="<?= $transaction_code?>">
      <input type="hidden" id="branch_id" name="branch_id" value="<?= $branch_id?>">
      <input type="hidden" id="transaction_date" name="transaction_date" value="<?= $transaction_date?>">
      <input type="hidden" id="jml_orang" name="jml_orang" value="<?= $jml_orang?>">
    </form>
    <form id="trans_totalpenjualan2">
      <input type="hidden" id="transaction_code" name="transaction_code" value="<?= $transaction_code?>">
      <input type="hidden" id="branch_id" name="branch_id" value="<?= $branch_id?>">
      <input type="hidden" id="transaction_date" name="transaction_date" value="<?= $transaction_date?>">
      <input type="hidden" id="grand_total" name="grand_total" value="<?= $grand_total?>">
    </form>
    <form id="trans_totaltransaksi">
      <input type="hidden" id="transaction_code" name="transaction_code" value="<?= $transaction_code?>">
      <input type="hidden" id="branch_id" name="branch_id" value="<?= $branch_id?>">
      <input type="hidden" id="transaction_date" name="transaction_date" value="<?= $transaction_date?>">
      <input type="hidden" id="table_id" name="table_id" value="<?= $table_id?>">
      <input type="hidden" id="jumlah" name="jumlah" value="1">
    </form>
    <form id="trans_totalperkepala">
      <input type="hidden" id="transaction_code" name="transaction_code" value="<?= $transaction_code?>">
      <input type="hidden" id="branch_id" name="branch_id" value="<?= $branch_id?>">
      <input type="hidden" id="transaction_date" name="transaction_date" value="<?= $transaction_date?>">
      <input type="hidden" id="jumlah" name="jumlah" value="<?= $per_kepala?>">
    </form>
    <form id="trans_totalpenjualan">
      <input type="hidden" id="transaction_code" name="transaction_code" value="<?= $transaction_code?>">
      <input type="hidden" id="branch_id" name="branch_id" value="<?= $branch_id?>">
      <input type="hidden" id="transaction_date" name="transaction_date" value="<?= $transaction_date?>">
      <input type="hidden" id="jumlah" name="jumlah" value="<?= $grand_total?>">
      <input type="hidden" id="jam" name="jam" value="<?= $jam?>">
    </form>
    <form id="trans_menu">
      <input type="hidden" id="branch_id" name="branch_id" value="<?= $branch_id?>">
      <input type="hidden" id="transaction_date" name="transaction_date" value="<?= $transaction_date?>">
      <input type="hidden" id="transaction_code" name="transaction_code" value="<?= $transaction_code?>">
      <?php
      for ($i=1; $i < $no ; $i++) {?>
        <br>
        <input type="hidden" id="menu_id" name="menu_id" value="<?= $menu_id[$i]?>">
        <input type="hidden" id="jml_menu" name="jml_menu" value="<?= $jml_menu[$i]?>">
        <input type="hidden" id="menu_price" name="menu_price" value="<?= $menu_price[$i]?>">
        <script type="text/javascript">

          $.ajax({
                type: "POST",
                url: url_7,
                data: $("#trans_menu").serialize(), // serializes the form's elements.
                success: function(response)
                {
                    // alert('success'); // show response from the php script.
                },
                error: function(data){
                  // alert('error');
                }
              });

        </script>
      <?}?>
    </form>

    <form id="trans_totalpenjualanmatrixmargin">
      <input type="hidden" id="transaction_code" name="transaction_code" value="<?= $transaction_code?>">
      <input type="hidden" id="branch_id" name="branch_id" value="<?= $branch_id?>">
      <input type="hidden" id="transaction_date" name="transaction_date" value="<?= $transaction_date?>">
      <?php
      for ($i=1; $i < $no ; $i++) {?>
        <br>
        <input type="hidden" id="menu_id" name="menu_id" value="<?= $menu_id[$i]?>">
        <input type="hidden" id="jml_menu" name="jml_menu" value="<?= $jml_menu[$i]?>">
        <input type="hidden" id="menu_price" name="menu_price" value="<?= $menu_price[$i]?>">

        <script type="text/javascript">
        $.ajax({
              type: "POST",
              url: url_8,
              data: $("#trans_totalpenjualanmatrixmargin").serialize(), // serializes the form's elements.
              dataType: "json",
              success: function(response)
              {
                  // alert('success'); // show response from the php script.
              },
              error: function(data){
                // alert('error');
              }
            });
        </script>
      <?}?>
    </form>

    <form id="trans_matrix">
      <input type="hidden" id="branch_id" name="branch_id" value="<?= $branch_id?>">
      <input type="hidden" id="transaction_date" name="transaction_date" value="<?= $transaction_date?>">
      <input type="hidden" id="transaction_code" name="transaction_code" value="<?= $transaction_code?>">
      <?php
      for ($i=1; $i < $no ; $i++) {?>
        <br>
        <input type="hidden" id="menu_id" name="menu_id" value="<?= $menu_id[$i]?>">
        <input type="hidden" id="jml_menu" name="jml_menu" value="<?= $jml_menu[$i]?>">
        <input type="hidden" id="menu_price" name="menu_price" value="<?= $menu_price[$i]?>">

        <script type="text/javascript">
        $.ajax({
              type: "POST",
              url: url_9,
              data: $("#trans_matrix").serialize(), // serializes the form's elements.
              success: function(response)
              {
                  // alert('success'); // show response from the php script.
              },
              error: function(data){
                // alert('error');
              }
            });
        </script>

      <?}?>
    </form>

    <form id="trans_tmenu">
      <input type="hidden" id="transaction_code" name="transaction_code" value="<?= $transaction_code?>">
      <input type="hidden" id="branch_id" name="branch_id" value="<?= $branch_id?>">
      <input type="hidden" id="transaction_date" name="transaction_date" value="<?= $transaction_date?>">
      <?php
      for ($i=1; $i < $no ; $i++) {?>
        <br>
        <input type="hidden" id="menu_id" name="menu_id" value="<?= $menu_id[$i]?>">
        <input type="hidden" id="jml_menu" name="jml_menu" value="<?= $jml_menu[$i]?>">
        <input type="hidden" id="menu_price" name="menu_price" value="<?= $menu_price[$i]?>">
        <input type="hidden" id="menu_kategori" name="menu_kategori" value="<?= $menu_kategori[$i]?>">

        <script type="text/javascript">
        $.ajax({
              type: "POST",
              url: url_10,
              data: $("#trans_tmenu").serialize(), // serializes the form's elements.
              success: function(response)
              {
                  // alert('success'); // show response from the php script.
              },
              error: function(data){
                // alert('error');
              }
            });
        </script>

      <?}?>
    </form>
    <form id="trans_matrix2">
      <input type="hidden" id="transaction_code" name="transaction_code" value="<?= $transaction_code?>">
      <input type="hidden" id="branch_id" name="branch_id" value="<?= $branch_id?>">
      <input type="hidden" id="transaction_date" name="transaction_date" value="<?= $transaction_date?>">
      <?php
      for ($i=1; $i < $no ; $i++) {?>
        <br>
        <input type="hidden" id="menu_id" name="menu_id" value="<?= $menu_id[$i]?>">
        <input type="hidden" id="jml_menu" name="jml_menu" value="<?= $jml_menu[$i]?>">
        <input type="hidden" id="menu_price" name="menu_price" value="<?= $menu_price[$i]?>">
        <input type="hidden" id="menu_kategori" name="menu_kategori" value="<?= $menu_kategori[$i]?>">

        <script type="text/javascript">
        $.ajax({
              type: "POST",
              url: url_11,
              data: $("#trans_matrix2").serialize(), // serializes the form's elements.
              success: function(response)
              {
                  // alert('success'); // show response from the php script.
              },
              error: function(data){
                // alert('error');
              }
            });
        </script>

      <?}?>
    </form>
  </body>
</html>
<script type="text/javascript">
var transaction_code = $('#transaction_code').val();
var branch_id = $('#branch_id').val();
var transaction_date = $('#transaction_date').val();

$(function(){
  $.ajax({
        type: "POST",
        url: url,
        data: $("#trans_tc").serialize(), // serializes the form's elements.
        success: function(data)
        {
            console.log(data);
        },
        error: function(){
          // alert('error!');
        }
      });

    $.ajax({
          type: "POST",
          url: url_2,
          data: $("#trans_totalpengunjung").serialize(), // serializes the form's elements.
          success: function()
          {
              // alert('success'); // show response from the php script.
          },
          error: function(){
            // alert('error!');
          }
        });

  $.ajax({
        type: "POST",
        url: url_3,
        data: $("#trans_totalpenjualan2").serialize(), // serializes the form's elements.
        success: function(response)
        {
            // alert('success'); // show response from the php script.
        },
        error: function(){
          // alert('error!');
        }
      });

    $.ajax({
          type: "POST",
          url: url_4,
          data: $("#trans_totaltransaksi").serialize(), // serializes the form's elements.
          success: function(response)
          {
              // alert('success'); // show response from the php script.
          },
          error: function(){
            // alert('error!');
          }
        });

      $.ajax({
            type: "POST",
            url: url_5,
            data: $("#trans_totalperkepala").serialize(), // serializes the form's elements.
            success: function(response)
            {
                // alert('success'); // show response from the php script.
            },
            error: function(){
              // alert('error!');
            }
          });

      $.ajax({
            type: "POST",
            url: url_6,
            data: $("#trans_totalpenjualan").serialize(), // serializes the form's elements.
            success: function(response)
            {
                // alert('success'); // show response from the php script.
            },
            error: function(){
              // alert('error!');
            }
          });
})
// window.onload = function(){
//     window.open(url, "_blank");
// }
</script >
