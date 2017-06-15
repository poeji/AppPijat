<div id="content_new_right">
    
<!-- Main content -->
 <section class="content" style="height:800px !important; max-height:500px;">
               <br>
                
               <?php 
                $q_right = mysql_query("SELECT t.`transaction_id`, r.`infrastruktur_name`, r.ruangan_infrastruktur_id
FROM `transactions_tmp` t
LEFT JOIN `transaction_kursi` k ON k.`transcaction_id` = t.`transaction_id`
LEFT JOIN `ruangan_infrastruktur` r ON r.`ruangan_infrastruktur_id` = k.`ruangan_infrastruktur_id`
WHERE transaction_code = 0 AND ruangan_id = '".$_GET['ruangan_id']."' AND k.branch_id = '".$_GET['branch_id']."' AND DATE_FORMAT(t.`transaction_date`, '%Y%m%d') = '$_GET[t]'");
                while($r_right = mysql_fetch_array($q_right)){

                    $qpjt = mysql_fetch_array(mysql_query("SELECT p.`pijat_name`, m.*, t.`transaction_detail_pemijat`, t.`transaction_id`
FROM `transactions_tmp` t
LEFT JOIN pijat p ON p.`pijat_id` = t.`pijat`
LEFT JOIN members m ON m.`member_id` = t.`member_id`
LEFT JOIN `transaction_kursi` k ON k.`transcaction_id` = t.`transaction_id`
WHERE transaction_code = 0 AND ruangan_id = '".$_GET['ruangan_id']."' AND ruangan_infrastruktur_id = '".$r_right['ruangan_infrastruktur_id']."' AND DATE_FORMAT(t.`transaction_date`, '%Y%m%d') = '$_GET[t]'"));
               ?>
                <div class="row">
                        <div class="col-md-12" style="padding-left:0; padding-right:10px;">
                            <div class="box">
                             <div class="box-header">
                                    <h3 class="box-title"><?=$r_right['infrastruktur_name']?></h3>                                    
                                </div>
                                <div class="box-body2 table-responsive">
                                <table id="example1" class="table table-bordered">
               <tr>
                <td style="width: 100px">Nama</td>
                <td><?=$qpjt['member_name']?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><?=$qpjt['member_alamat']?></td>
              </tr>
              <tr>
                <td>Terapis</td>
                <td><?=$qpjt['transaction_detail_pemijat']?></td>
              </tr>
          </table>
          <hr>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Menu</th>
                                                <?php /*
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                */ ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr onclick="" style="cursor:pointer;">
                                            <td>1</td>
                                            <td><?=$qpjt['pijat_name']?></td>
                                            <?php /*
                                            <td><?php print number_format($dtempr['item_satuan']); ?></td>
                                            <td><?php print number_format($dtempr['item_harga_jual']); ?></td>
                                            */ ?>
                                        </tr>
                                        <?php 
                                        $nom = 2;
                                         $qtempr = mysql_query("SELECT d.`transaction_detail_id`, i.* FROM `transaction_tmp_details` d 
                                            LEFT JOIN item i ON i.`item_id` = d.`transaction_detail_item_qty`
                                            WHERE d.transaction_id = '".$r_right['transaction_id']."' AND d.transaction_detail_status = 0");
                                                    while ($dtempr = mysql_fetch_array($qtempr)) {
                                                    ?>                                        
                                        <tr onclick="javascript:window.location.href='transaksi.php?page=del_list&detailid=<?=$dtempr['transaction_detail_id']?>&member=<?=$_GET['member']?>&id=<?=$_GET['id']?>&branch_id=<?=$_GET['branch_id']?>&ruangan_id=<?=$_GET['ruangan_id']?>&t=<?=$_GET['t']?>'" style="cursor:pointer;">
                                            <td><?=$nom?></td>
                                            <td><?=$dtempr['item_name']?></td>
                                            <?php /*
                                            <td><?php print number_format($dtempr['item_satuan']); ?></td>
                                            <td><?php print number_format($dtempr['item_harga_jual']); ?></td>
                                            */ ?>
                                        </tr>
                                        <?php $nom++; } ?>
                                        </tbody>
                                                                                 
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                 </div>
                 <?php } ?>

                    



</section></div>