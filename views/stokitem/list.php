  <?php
  if(isset($_GET['did']) && $_GET['did'] == 1){ ?>
    <section class="content_new">
      <div class="alert alert-info alert-dismissable">
        <i class="fa fa-check"></i>
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
        <b>Sukses !</b>
        Simpan Berhasil
      </div>
    </section>
  <?php
  }else if(isset($_GET['did']) && $_GET['did'] == 2){ ?>
    <section class="content_new">
      <div class="alert alert-info alert-success">
        <i class="fa fa-check"></i>
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
        <b>Sukses !</b>
        Edit Berhasil
      </div>
    </section>
  <?php
  }else if(isset($_GET['did']) && $_GET['did'] == 3){?>
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
      <div class="col-md-12">
        <div class="title_page"> <?= $title ?></div>
        <div class="box">
          <div class="box-body2 table-responsive">
            <div class="col-md-12">
              <table id="example1" class="table table-bordered table-striped">
              <thead style="background-color: #9975a1; color: #fff;">
                <tr>
                  <th width="5%">No</th>
                  <th>Nama Item</th>
                  <th>Stok</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $no = 1;
              $query = mysql_query("SELECT i.`item_name`, s.`qty`
                FROM `stok_item` s
                LEFT JOIN `item` i ON i.`item_id` = s.`item_id`
                WHERE s.`branch_id` = $_SESSION[branch_id]");
                while($row = mysql_fetch_array($query)){ ?>
                    <tr>
                      <td><?= $no?></td>
                      <td><?= $row['item_name']?></td>
                      <td><strong><?= $row['qty']?></strong> Mili Liter</td>
                    </tr>
              <?php $no++; } ?>
              </tbody>
            </table>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>
  </section><!-- /.content -->
