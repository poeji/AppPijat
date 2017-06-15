
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body2 table-responsive">
        <div class="box-header">
          <h3 class="box-title"><strong>Detail Per Pijat</strong></h3>
        </div>
        <table id="list_item_tb" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th>Nama Pijat</th>
              <th>Qty</th>
              <th>Omset</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no_item = 1;
          $grand_total_dasar = 0;
          $grand_total_omset = 0;
          while($row_item = mysql_fetch_array($query_item)){
          $jumlah = ($row_item['jumlah']) ? $row_item['jumlah'] : 0;
          $total = $jumlah * $row_item['pijat_harga']; //$row_item['menu_price'];?>
            <tr>
              <td><?= $no_item ?></td>
              <td><?= $row_item['pijat_name']; ?></td>
              <td><?= tool_format_number($row_item['jumlah'])?></td>
              <td><?= tool_format_number($row_item['pijat_harga'])?></td>
            </tr>
          <?php
          $grand_total_dasar = 0; //$grand_total_dasar + $row_item['jumlah_dasar'];
          $grand_total_omset += $row_item['pijat_harga']; //$grand_total_omset + $row_item['jumlah_omset'];
          $no_item++; } ?>
          </tbody>
          <tfoot>
            <tr>
              <td style="border-right:none"></td>
              <td style="border-right:none"></td>
              <td  style="font-size:22px; font-weight:bold;">TOTAL</td>
              <td><?= tool_format_number_report($grand_total_omset)?></td>
            </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $("#list_item_tb").dataTable({
    dom: 'Bfrtip',
    buttons: [

        {
            extend: 'pageLength'
        },
        {
            extend: 'copy'
        },
        {
            extend: 'excel'
        },
        {
            extend: 'pdf'
        },
        {
            extend: 'print',
            title  : 'Bakmi Gili Item Details',
            footer: 'trur'
        }
    ],
    lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
    ]
  });
});
</script>
