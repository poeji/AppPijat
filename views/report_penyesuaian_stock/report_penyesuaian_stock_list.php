<?php if(isset($_GET['did']) && $_GET['did'] == 1){ ?>
<section class="content_new">
  <div class="alert alert-info alert-dismissable">
    <i class="fa fa-check"></i>
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <b>Sukses !</b>
    Simpan Berhasil
  </div>
</section>
<?php }else if(isset($_GET['did']) && $_GET['did'] == 2){ ?>
<section class="content_new">
  <div class="alert alert-info alert-dismissable">
    <i class="fa fa-check"></i>
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <b>Sukses !</b>
    Edit Berhasil
  </div>
</section>
<?php }else if(isset($_GET['did']) && $_GET['did'] == 3){ ?>
<section class="content_new">
  <div class="alert alert-info alert-dismissable">
    <i class="fa fa-check"></i>
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <b>Sukses !</b>
    Delete Berhasil
  </div>
</section>
<?php } ?>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="title_page"> <?= $title ?></div>
<div class="box">
  <div class="box-body2 table-responsive">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
              <tr>
              <th width="5%">No</th>
                  <th>Nama Item</th>
                  <th>Tanggal penyesuaian</th>
                  <th>Jumlah Awal</th>
                  <th>Selisih</th>
                  <th>Jumlah Akhir</th>
                  <th>Cabang</th>
                  <th>Admin</th>
              </tr>
          </thead>
          <tbody>
              <?php
             $no = 1;
              while($row = mysql_fetch_array($query)){ ?>
              <tr>
                  <td><?= $no?></td>
                   <td><?= $row['item_name']?></td>
                   <td><?= $row['date_penyesuaian']?></td>
                   <td><?= $row['item_qty_awal']?></td>
                   <td><?= $row['item_qty_new']?></td>
                   <td><?= $row['item_stock_qty']?></td>
                   <td><?= $row['branch_name']?></td>
                   <td><?= $row['user_name']?></td>
              </tr>
              <?php $no++; } ?>
          </tbody>
            <tfoot>
              <!-- <tr>
                  <td colspan="7"><a href="<?= $add_button ?>" class="btn btn-danger " >Add</a></td>
              </tr> -->
          </tfoot>
      </table>
  </div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
</section><!-- /.content -->
