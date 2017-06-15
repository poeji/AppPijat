<?php /*
• Nama Customer
• Detail waktu dan Tanggal
• Jenis pijat, lama pijat, item yang digunakan
• Item yang dibeli untuk dibawa pulang
• Total harga per item
• Total Tarif pijat 
*/ ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body2 table-responsive">
        <div class="box-header">
          <h3 class="box-title"><strong>Detail Pemasukan Item</strong></h3>
        </div>
        <table id="list_item_tb2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th>Nama Item</th>
              <th>Harga Jual</th>
              <th>Total Terjual</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no_item2 = 1;
          $grand_total_omset2 = 0;

          $query2 = mysql_query("SELECT SUM(p.`purchase_qty`) AS total, i.`item_name`, s.`satuan_name`, p.`purchase_price`, p.`purchase_total` 
FROM `purchases` p
LEFT JOIN item i ON i.`item_id` = p.`item_id`
LEFT JOIN satuan s ON s.`satuan_id` = p.`satuan_id`
WHERE p.`purchase_date` >= '$date1 00:00:00' AND p.purchase_date <= '$date2 23:59:59'
GROUP BY i.`item_id`
ORDER BY i.`item_name` ASC");

          while($row_item2 = mysql_fetch_array($query2)){
          //$jumlah = ($row_item['jumlah']) ? $row_item['jumlah'] : 0;
          //$total = $jumlah * $row_item['menu_price'];?>
            <tr>
              <td><?= $no_item2 ?></td>
              <td><?= $row_item2['item_name']; ?></td>
              <td><?= tool_format_number($row_item2['purchase_price']); ?></td>
              <td align="right"><?= $row_item2['total']; ?></td>
              <td><?= tool_format_number($row_item2['purchase_price'])?></td>
            </tr>
          <?php
          $grand_total_omset2 += $row_item2['purchase_price'];
          $no_item2++; }
          //$totalitem += $row_item2['total'];
           ?>
          </tbody>
          <tfoot>
            <tr>
              <td style="border-right:none"></td>
              <td style="border-right:none"></td>
              <td style="border-right:none"></td>
              <td  style="font-size:22px; font-weight:bold;">TOTAL</td>
              <td><?= tool_format_number_report($grand_total_omset2)?></td>
            </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>




  <?php /*
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body2 table-responsive">
        <div class="box-header">
          <h3 class="box-title"><strong>Detail Per Pijat2</strong></h3>
        </div>
        <table id="list_item_tb" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th>Nama Customer</th>
              <th>Waktu</th>
              <th>Jenis</th>
              <th>lama</th>
              <th>Waktu</th>
              <th>Nama Pijat</th>
              <th>Omset</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no_item = 1;
          $grand_total_omset = 0;

          $query = mysql_query("SELECT m.`member_name`, DATE_FORMAT(t.`transaction_date`, '%d-%m-%Y') AS tgl, DATE_FORMAT(t.`transaction_date`, '%H:%i:%s') AS jam, p.`pijat_name`,
p.`pijat_waktu`, p.`pijat_harga`, t.`pemijat`, t.transaction_total
FROM `transactions` t
LEFT JOIN `members` m ON m.`member_id` = t.`member_id`
LEFT JOIN pijat p ON p.`pijat_id` = t.`pijat_id`
WHERE  t.transaction_date >= '$date1' AND t.transaction_date <= '$date2'");

          while($row_item = mysql_fetch_array($query)){
          //$jumlah = ($row_item['jumlah']) ? $row_item['jumlah'] : 0;
          //$total = $jumlah * $row_item['menu_price'];?>
            <tr>
              <td><?= $no_item ?></td>
              <td><?= $row_item['member_name']; ?></td>
              <td><?= $row_item['tgl']; ?> <?= $row_item['jam']; ?></td>
              <td><?= $row_item['pijat_name']; ?></td>
              <td><?= $row_item['pijat_waktu']; ?> menit</td>
              <td><?= tool_format_number($row_item['pijat_harga']); ?></td>
              <td><?= $row_item['pemijat']; ?></td>
              <td><?= tool_format_number($row_item['transaction_total'])?></td>
            </tr>
          <?php
          $grand_total_omset += $row_item['transaction_total'];
          $no_item++; }

           ?>
          </tbody>
          <tfoot>
            <tr>
              <td style="border-right:none"></td>
              <td style="border-right:none"></td>
              <td style="border-right:none"></td>
              <td style="border-right:none"></td>
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
  */ ?>

<script type="text/javascript">
  $(function(){
    $("#list_item_tb2").dataTable({
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
